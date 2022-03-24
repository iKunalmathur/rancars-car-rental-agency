<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Car;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.users.index", [
            "users" => User::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.users.create", [
            "roles" => Role::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'role_id' => ['required', 'exists:roles,id'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        // save image
        if ($request->hasFile("image")) {
            $imagePath = $request->file('image')->store("/users", "public");
        }

        User::create([
            "image" => $imagePath ?? null,
            'role_id' => $request->role_id,
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

        ]);
        session()->flash("success", "User created successfully");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("admin.users.edit", [
            "user" => $user,
            "roles" => Role::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // dd($request->all());
        $request->validate([
            'role_id' => ['required', 'exists:roles,id'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user)],
        ]);

        // save image
        if ($request->hasFile("image")) {
            if ($user->image) Storage::disk("public")->delete($user->image);
            $imagePath = $request->file('image')->store("/users", "public");
        }

        $user->update([
            'role_id' => $request->role_id,
            "image" => $imagePath ?? $user->image,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        session()->flash("success", "User updated successfully");
        return back();
    }

    public function password(Request $request, User $user)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $isVerified = Hash::check($request->current_password, $user->password);

        if (!$isVerified) {
            session()->flash("danger", "Invalid Password!");
            return back();
        }

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        session()->flash("success", "Password changed successfully!");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if ($user->owner_id === auth()->id()) {
            $user->delete();
            session()->flash("success", "User deleted successfully");
        } else {
            session()->flash("danger", "Unauthorized!!");
        }

        return back();
    }
}
