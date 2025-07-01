<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        return view('produk.produk');
    }

    public function list_produk()
    {
        $produk = ProdukModel::select('id_produk', 'nama_produk', 'satuan', 'stok_produk')->get();
        return view('produk.produk', compact('produk'));
    }


    public function tambah_produk(Request $request)
    {

        $request->validate([
            'id_produk' => 'required|string|max:11',
            'nama_produk' => 'required|string|max:100',
            'satuan' => 'required|in:pcs,pack',
            'stok_produk' => 'required|integer|min:0',
            'kedaluwarsa_produk' => 'required|date|after_or_equal:today',
            // id_user
        ]);

        ProdukModel::create([
            'id_produk' => $request->id_produk,
            'nama_produk' => $request->nama_produk,
            'satuan' => $request->satuan,
            'stok_produk' => $request->stok_produk,
            'kedaluwarsa_produk' => $request->kedaluwarsa_produk,
            //id_user
        ]);

        return response()->json([
            'message' => 'Berhasil menambahkan Produk'
        ]);
    }

    public function update_produk(Request $request)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:100',
            'satuan' => 'required|in:pcs,pack',

        ]);

        $produk = ProdukModel::find($request->id_produk);

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'satuan' => $request->satuan,

        ]);

        return response()->json(['message' => 'Data Produk Berhasil diupdate']);
    }

    public function hapus_produk(Request $request)
    {
        $produk = ProdukModel::find($request->id_produk);
        $produk->delete();

        return redirect('/produk/list');
    }
}
