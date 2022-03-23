<?php

namespace App\Http\Controllers\Owner;

use App\Http\Controllers\Controller;

class LoginController extends Controller
{

    public function create()
    {
        return view("owner.login");
    }
}
