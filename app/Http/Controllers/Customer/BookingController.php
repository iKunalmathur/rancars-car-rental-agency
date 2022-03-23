<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("customer.bookings.index", [
            "bookings" => Booking::where("buyer_id", auth()->id())->get()
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
            "car_id" => ["required"],
            "start_date" => ["required"],
            "end_date" => ["nullable"],
            "number_of_days" => ["required"],
        ]);

        $car = Car::select("id", "rent", "owner_id")->findOrFail($request->car_id);

        Booking::create([
            "owner_id" => $car->owner_id,
            "car_id" => $car->id,
            "buyer_id" => auth()->id(),
            "start_date" => $request->start_date,
            "end_date" => $request->end_date,
            "number_of_days" => $request->number_of_days,
            "rent" => $car->rent,
        ]);
        session()->flash("success", "Booking created successfully");
        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        if ($booking->owner_id === auth()->id() || $booking->buyer_id === auth()->id()) {
            $booking->delete();
            session()->flash("success", "Booking deleted successfully");
        } else {
            session()->flash("danger", "Unauthorized!!");
        }

        return back();
    }
}
