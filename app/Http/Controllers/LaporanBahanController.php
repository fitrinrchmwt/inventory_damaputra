<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LaporanBahanController extends Controller
{
    public function index()
    {
        return view('Laporan.bahan');
    }
}
