<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        return view('Login.login');
    }

    public function lupa_password()
    {
        return view('Login.lupaPassword');
    }
}
