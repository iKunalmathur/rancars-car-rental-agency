<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Car;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view("admin.dashboard", [
            "users_count" => User::count(),
            "cars_count" => Car::count(),
            "bookings_count" => Booking::count()
        ]);
    }
}
