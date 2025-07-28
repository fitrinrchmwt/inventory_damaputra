<?php

namespace App\Http\Controllers;

use App\Models\BahanBakuModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BahanBakuController extends Controller
{
   

    public function list_bahan()
    {
        $dataBahan = BahanBakuModel::select('id_bahan', 'nama_bahan', 'satuan', 'stok_bahan','created_at','updated_at','id_user')->get();

        // Generate ID Bahan otomatis
        $lastBahan = BahanBakuModel::orderBy('id_bahan', 'desc')->first();
        $lastNumber = $lastBahan ? (int) substr($lastBahan->id_bahan, 3) : 0;
        $newNumber = $lastNumber + 1;
        $kodeOtomatis = 'BB-' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        return view('bahan.bahan', compact('dataBahan', 'kodeOtomatis'));
    }

    public function tambah_bahan(Request $request)
    {
        $request->validate([
            'id_bahan' => 'required|string|max:11',
            'nama_bahan' => 'required|string|max:100',
            'satuan' => 'required|in:Liter,Kg,Gram',
            'stok_bahan' => 'required|integer|min:0',
            //'kedaluwarsa_bahan' => 'required|date|after_or_equal:today',
            // id_user
        ]);

        BahanBakuModel::create([
            'id_bahan' => $request->id_bahan,
            'nama_bahan' => $request->nama_bahan,
            'satuan' => $request->satuan,
            'stok_bahan' => $request->stok_bahan,
            //'kedaluwarsa_bahan' => $request->kedaluwarsa_bahan,
            'id_user' => session('id_user'),
        ]);

        return redirect('/bahanbaku')->with('success', 'Bahan Baku berhasil ditambahkan!');
    }

    public function update_bahan(Request $request)
    {
        $request->validate([
            'id_bahan' => 'required|exists:bahanbaku,id_bahan',
            'nama_bahan' => 'required|string|max:100',
            'satuan' => 'required|in:Liter,Kg,Gram',
            'stok_bahan' => 'required|integer|min:0',

        ]);

        $bahan = BahanBakuModel::find($request->id_bahan);

        $bahan->update([
            'nama_bahan' => $request->nama_bahan,
            'satuan' => $request->satuan,
            'stok_bahan' => $request->stok_bahan,

        ]);

        return redirect('/bahanbaku')->with('success', 'Data Bahan Baku berhasil diupdate.');
        //return response()->json(['message' => 'Data Bahan Berhasil diupdate']);
    }

    public function hapus_bahan($id_bahan)
{
    $bahan = BahanBakuModel::findOrFail($id_bahan);
    $bahan->delete();

    return redirect('/bahanbaku')->with('success', 'Bahan berhasil dihapus.');
}

public function filterBahan(Request $request)
    {

        


        $query = BahanBakuModel::select('*');
        
        if ($request->nama_bahan) {
            $query->where('nama_bahan', 'like', '%' . $request->nama_bahan . '%');
            
        }

        if($request->satuan) {
            $query->where('satuan', $request->satuan);
        }

        if ($request->stok_min) {
            $query->where('stok_bahan', '>=', $request->stok_min);
        }

        if ($request->stok_max) {
            $query->where('stok_bahan', '<=', $request->stok_max);
        }

        if ($request->tanggal) {
            $query->whereDate('created_at', '=', $request->tanggal);
        }

        if ($request->updated_at) {
            $query->whereDate('updated_at', '=', $request->updated_at);
        }

        

        

        $data = $query->get();
        

        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
}
