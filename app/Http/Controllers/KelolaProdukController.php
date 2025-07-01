<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelolaProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function produk_masuk()
    {
        return view('KelolaProduk.produkMasuk');
    }

    public function produk_keluar()
    {
        return view('KelolaProduk.produkKeluar');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(KelolaProdukModel $kelolaProdukModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KelolaProdukModel $kelolaProdukModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KelolaProdukModel $kelolaProdukModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KelolaProdukModel $kelolaProdukModel)
    {
        //
    }
}
