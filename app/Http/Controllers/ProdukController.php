<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function list_produk()
    {
        $dataProduk = ProdukModel::select('id_produk', 'nama_produk', 'satuan', 'stok_produk', 'id_user', 'created_at', 'updated_at')->get();

        // Generate ID Produk otomatis
        $lastProduk = ProdukModel::orderBy('id_produk', 'desc')->first();
        $lastNumber = $lastProduk ? (int) substr($lastProduk->id_produk, 3) : 0;
        $newNumber = $lastNumber + 1;
        $kodeOtomatis = 'PR-' . str_pad($newNumber, 3, '0', STR_PAD_LEFT);

        return view('produk.produk', compact('dataProduk', 'kodeOtomatis'));
    }


    public function tambah_produk(Request $request)
    {


        $request->validate([
            'id_produk' => 'required|string|max:11',
            'nama_produk' => 'required|string|max:100',
            'satuan' => 'required|in:pcs,pack',
            'stok_produk' => 'required|integer|min:0',
            //id_user
        ]);

        ProdukModel::create([
            'id_produk' => $request->id_produk,
            'nama_produk' => $request->nama_produk,
            'satuan' => $request->satuan,
            'stok_produk' => $request->stok_produk,
            'id_user' => session('id_user'),
        ]);

        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan!');
        //return redirect('/produk')->with('error', 'Gagal menambahkan produk!');

    }


    // Menampilkan form edit
    // public function edit($id_produk)
    // {
    //     $data = ProdukModel::findOrFail($id_produk);
    //     return view('produk.formEditProduk', compact('data'));
    // }

    public function update_produk(Request $request)
    {
        $request->validate([
            'id_produk' => 'required|exists:produk,id_produk',
            'nama_produk' => 'required|string|max:100',
            'satuan' => 'required|in:pcs,pack',
            'stok_produk' => 'required|integer|min:0',

        ]);

        $produk = ProdukModel::find($request->id_produk);

        $produk->update([
            'nama_produk' => $request->nama_produk,
            'satuan' => $request->satuan,
            'stok_produk' => $request->stok_produk,

        ]);

        return redirect('/produk')->with('success', 'Produk berhasil diupdate.');
        //return response()->json(['message' => 'Data Produk Berhasil diupdate']);
    }

        public function hapus_produk($id_produk)
{
    $produk = ProdukModel::findOrFail($id_produk);
    $produk->delete();

        return redirect('/produk')->with('success', 'Produk berhasil dihapus.');
}

//     public function destroy($id)
// {
//     ProdukModel::destroy($id);
//     return response()->json(['message' => 'Produk berhasil dihapus']);
// }



    public function filterProduk(Request $request)
    {

        


        $query = ProdukModel::select('*');
        
        if ($request->nama_produk) {
            $query->where('nama_produk', 'like', '%' . $request->nama_produk . '%');
            
        }

        if($request->satuan) {
            $query->where('satuan', $request->satuan);
        }

        if ($request->stok_min) {
            $query->where('stok_produk', '>=', $request->stok_min);
        }

        if ($request->stok_max) {
            $query->where('stok_produk', '<=', $request->stok_max);
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