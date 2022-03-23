<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;
use App\Models\Car;
use Illuminate\Http\Request;
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
        return view("owner.cars.index", [
            "cars" => Car::where("owner_id", auth()->id())->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("owner.cars.create");
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

        Car::create([
            "owner_id" => auth()->id(),
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
        return view("owner.cars.show", [
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
        return view("owner.cars.edit", [
            "car" => $car
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

        $car->update([
            "name" => $request->name,
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
