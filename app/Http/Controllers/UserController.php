<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('User.profile');
    }
    public function kelola_user()
    {
        return view('User.user');
    }
}
