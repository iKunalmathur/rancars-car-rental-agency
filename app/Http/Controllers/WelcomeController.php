<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("welcome", [
            "cars" => Car::paginate(4)
        ]);
    }
}
