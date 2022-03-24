<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;


class AccountController extends Controller
{
    public function index()
    {
        return view("auth.account", [
            "authUser" => auth()->user()
        ]);
    }

    public function details(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore(auth()->id())],
        ]);

        $authUser = User::findOrFail(auth()->id());


        // save image
        if ($request->hasFile("image")) {
            if ($authUser->image) Storage::disk("public")->delete($authUser->image);
            $imagePath = $request->file('image')->store("/users", "public");
        }

        $authUser->update([
            "image" => $imagePath ?? $authUser->image,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        session()->flash("success", "User details updated!");
        return back();
    }

    public function password(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $authUser = User::findOrFail(auth()->id());

        $isVerified = Hash::check($request->current_password, $authUser->password);

        if (!$isVerified) {
            session()->flash("danger", "Invalid Password!");
            return back();
        }

        $authUser->update([
            'password' => Hash::make($request->password),
        ]);

        session()->flash("success", "Password Changed!");
        return back();
    }
}
