<?php

namespace App\Http\Controllers;

use App\Models\BahanBakuModel;
use Illuminate\Http\Request;

class BahanBakuController extends Controller
{
   

    public function list_bahan()
    {
        $bahan = BahanBakuModel::select('id_bahan', 'nama_bahan', 'satuan', 'stok_bahan', 'id_user', 'kedaluwarsa_bahan')->get();
        return view('bahan.bahan', compact('bahan'));
    }

    public function tambah_bahan(Request $request)
    {
        $request->validate([
            'id_bahan' => 'required|string|max:11',
            'nama_bahan' => 'required|string|max:100',
            'satuan' => 'required|in:Liter,Kg,Gram',
            'stok_bahan' => 'required|integer|min:0',
            'kedaluwarsa_bahan' => 'required|date|after_or_equal:today',
            // id_user
        ]);

        BahanBakuModel::create([
            'id_bahan' => $request->id_bahan,
            'nama_bahan' => $request->nama_bahan,
            'satuan' => $request->satuan,
            'stok_bahan' => $request->stok_bahan,
            'kedaluwarsa_bahan' => $request->kedaluwarsa_bahan,
            //id_user
        ]);

        return response()->json([
            'message' => 'Berhasil menambahkan Bahan'
        ]);
    }

    public function update_bahan(Request $request)
    {
        $request->validate([
            'nama_bahan' => 'required|string|max:100',
            'satuan' => 'required|in:Liter,Kg,Gram',

        ]);

        $bahan = BahanBakuModel::find($request->id_bahan);

        $bahan->update([
            'nama_bahan' => $request->nama_bahan,
            'satuan' => $request->satuan,

        ]);

        return response()->json(['message' => 'Data Bahan Berhasil diupdate']);
    }

    public function hapus_bahan(Request $request)
    {
        $bahan = BahanBakuModel::find($request->id_bahan);
        $bahan->delete();

        return redirect('/bahan/list');
    }
}
