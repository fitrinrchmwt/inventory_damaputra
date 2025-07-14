<?php

namespace App\Http\Controllers;

use App\Models\KelolaProdukModel;
use Illuminate\Http\Request;
use App\Models\ProdukModel;

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
        $dataProdukMasuk = KelolaProdukModel::select(
            'id_kelola_pr',
            'jenis_pencatatan',
            'mengelola_produk.id_produk',
            'jumlah_produk',
            'keterangan',
            'kedaluwarsa_produk_kelola',
            'mengelola_produk.created_at',
            'mengelola_produk.updated_at',
            'produk.nama_produk',
            'produk.satuan'
            //'id_user',
        )->join('produk', 'produk.id_produk', '=', 'mengelola_produk.id_produk')
            ->where('jenis_pencatatan', 'pemasukan_produk')
            ->get();

        //Generate ID otomatis khusus pemasukan
        $last = KelolaProdukModel::where('jenis_pencatatan', 'pemasukan_produk')->orderBy('id_kelola_pr', 'desc')->first();
        $lastNumber = $last ? (int) substr($last->id_kelola_pr, 3) : 0;
        $newNumber = $lastNumber + 1;
        $kodeOtomatis = 'PM-' . str_pad($newNumber, 4, '0', STR_PAD_LEFT);

        $list_produk = ProdukModel::all();

        return view('KelolaProduk.produkMasuk', compact('dataProdukMasuk', 'kodeOtomatis', 'list_produk'));

    }




    public function tambah_produk_masuk(Request $request)
    {
        $request->validate([
            'id_kelola_pr' => 'required|unique:mengelola_produk,id_kelola_pr',
            'id_produk' => 'required|exists:produk,id_produk',
            'jumlah_produk' => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:255',
            'kedaluwarsa_produk_kelola' => 'nullable|date',
        ]);

        KelolaProdukModel::create([
            'id_kelola_pr' => $request->id_kelola_pr,
            'id_produk' => $request->id_produk,
            'jumlah_produk' => $request->jumlah_produk,
            'keterangan' => $request->keterangan,
            'kedaluwarsa_produk_kelola' => $request->kedaluwarsa_produk_kelola,
            'jenis_pencatatan' => 'pemasukan_produk',
            //'id_user' => auth()->user()->id_user ?? 'ADM-001', // bisa disesuaikan
        ]);

        return redirect('/kelolaprodukmasuk')->with('success', 'Data produk masuk berhasil disimpan.');
    }

    public function getNamaProduk($id_produk)
    {
        $produk = ProdukModel::where('id_produk', $id_produk)->first();

        if ($produk) {
            return response()->json(['nama_produk' => $produk->nama_produk]);
        } else {
            return response()->json(['nama_produk' => null]);
        }
    }



    public function produk_keluar()
    {
        $dataProdukKeluar = KelolaProdukModel::select(
            'id_kelola_pr',
            'jenis_pencatatan',
            'mengelola_produk.id_produk',
            'jumlah_produk',
            'keterangan',
            'kedaluwarsa_produk_kelola',
            'mengelola_produk.created_at',
            'mengelola_produk.updated_at',
            'produk.nama_produk',
            'produk.satuan'
            //'id_user',
        )->join('produk', 'produk.id_produk', '=', 'mengelola_produk.id_produk')
            ->where('jenis_pencatatan', 'pengeluaran_produk')
            ->get();

        // Generate ID otomatis khusus pengeluaran
        $lastKeluar = KelolaProdukModel::where('jenis_pencatatan', 'pengeluaran_produk')
            ->orderBy('id_kelola_pr', 'desc')
            ->first();

        $lastNumberKeluar = $lastKeluar ? (int) substr($lastKeluar->id_kelola_pr, 3) : 0; // PK-xxxx
        $kodeOtomatis = 'PK-' . str_pad($lastNumberKeluar + 1, 4, '0', STR_PAD_LEFT);



        // Ambil semua produk untuk select option
        $list_produk = ProdukModel::all();
        return view('KelolaProduk.produkKeluar', compact('dataProdukKeluar', 'kodeOtomatis', 'list_produk'));

    }

    public function tambah_produk_keluar(Request $request)
    {
        $request->validate([
            'id_kelola_pr' => 'required|unique:mengelola_produk,id_kelola_pr',
            'id_produk' => 'required|exists:produk,id_produk',
            'jumlah_produk' => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:255',
            'kedaluwarsa_produk_kelola' => 'nullable|date',
        ]);

        KelolaProdukModel::create([
            'id_kelola_pr' => $request->id_kelola_pr,
            'id_produk' => $request->id_produk,
            'jumlah_produk' => $request->jumlah_produk,
            'keterangan' => $request->keterangan,
            'kedaluwarsa_produk_kelola' => $request->kedaluwarsa_produk_kelola,
            'jenis_pencatatan' => 'pengeluaran_produk',
            'id_user' => 'ADM-001', // Ganti sesuai user login
        ]);

        return redirect('/kelolaprodukkeluar')->with('success', 'Data produk keluar berhasil disimpan.');
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
