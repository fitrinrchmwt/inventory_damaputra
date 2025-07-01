<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaBahanController extends Controller
{
    public function bahan_masuk()
    {
        return view('KelolaBahan.bahanMasuk');
    }

    public function bahan_keluar()
    {
        return view('KelolaBahan.bahanKeluar');
    }
}

