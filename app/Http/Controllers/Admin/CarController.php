<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("admin.cars.index", [
            "cars" => Car::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.cars.create", [
            "owners" => User::where("role_id", Role::IS_OWNER)->get()
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
            "name" => ["required"],
            "rent" => ["required"],
            "model" => ["required"],
            "seating_capacity" => ["required"],
            "plate_number" => ["required", Rule::unique("cars", "plate_number")],
        ]);

        // save image
        if ($request->hasFile("image")) {
            $imagePath = $request->file('image')->store("/cars", "public");
        }

        Car::create([
            "owner_id" => $request->owner_id ?? auth()->id(),
            "image" => $imagePath ?? "",
            "name" => $request->name,
            "rent" => $request->rent,
            "model" => $request->model,
            "seating_capacity" => $request->seating_capacity,
            "plate_number" => $request->plate_number,
        ]);
        session()->flash("success", "Car created successfully");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function show(Car $car)
    {
        return view("admin.cars.show", [
            "car" => $car
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        return view("admin.cars.edit", [
            "car" => $car,
            "owners" => User::where("role_id", Role::IS_OWNER)->get()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request->validate([
            "name" => ["required"],
            "rent" => ["required"],
            "model" => ["required"],
            "seating_capacity" => ["required"],
            "plate_number" => ["required", Rule::unique("cars", "plate_number")->ignore($car)],
        ]);

        // save image
        if ($request->hasFile("image")) {
            if ($car->image) Storage::disk("public")->delete($car->image);
            $imagePath = $request->file('image')->store("/cars", "public");
        }

        $car->update([
            "owner_id" => $request->owner_id ?? auth()->id(),
            "name" => $request->name,
            "image" => $imagePath ?? $car->image,
            "rent" => $request->rent,
            "model" => $request->model,
            "seating_capacity" => $request->seating_capacity,
            "plate_number" => $request->plate_number,
        ]);
        session()->flash("success", "Car updated successfully");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Car  $car
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        if ($car->owner_id === auth()->id()) {
            $car->delete();
            session()->flash("success", "Car deleted successfully");
        } else {
            session()->flash("danger", "Unauthorized!!");
        }

        return back();
    }
}
