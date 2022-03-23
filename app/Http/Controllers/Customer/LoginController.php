<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;


class LoginController extends Controller
{

    public function create()
    {
        return view("customer.login");
    }
}
