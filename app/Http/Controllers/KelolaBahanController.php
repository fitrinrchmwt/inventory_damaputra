<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KelolaBahanModel;
use App\Models\BahanBakuModel;

class KelolaBahanController extends Controller
{
    public function bahan_masuk()
    {
        $dataBahanMasuk = KelolaBahanModel::select(
            'id_kelola_bb',
            'jenis_pencatatan',
            'mengelola_bahan.id_bahan',
            'jumlah_bahan',
            'keterangan',
            'kedaluwarsa_bahan_kelola',
            'mengelola_bahan.created_at',
            'mengelola_bahan.updated_at',
            'bahanbaku.nama_bahan',
            'bahanbaku.satuan'
            //id_user
        )
            ->join('bahanbaku', 'bahanbaku.id_bahan', '=', 'mengelola_bahan.id_bahan')
            ->where('jenis_pencatatan', 'pemasukan_bahanbaku')
            ->get();

        $last = KelolaBahanModel::where('jenis_pencatatan', 'pemasukan_bahanbaku')
            ->orderBy('id_kelola_bb', 'desc')
            ->first();

        $lastNumber = $last ? (int) substr($last->id_kelola_bb, 3) : 0;
        $kodeOtomatis = 'BM-' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);
        
        $list_bahan = BahanBakuModel::all();

        return view('KelolaBahan.bahanMasuk', compact('dataBahanMasuk', 'kodeOtomatis', 'list_bahan'));
    }

    public function tambah_bahan_masuk(Request $request)
    {
        $request->validate([
            'id_kelola_bb' => 'required|unique:mengelola_bahan,id_kelola_bb',
            'id_bahan' => 'required|exists:bahanbaku,id_bahan',
            'jumlah_bahan' => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:255',
            'kedaluwarsa_bahan_kelola' => 'nullable|date',
        ]);

        KelolaBahanModel::create([
            'id_kelola_bb' => $request->id_kelola_bb,
            'id_bahan' => $request->id_bahan,
            'jumlah_bahan' => $request->jumlah_bahan,
            'keterangan' => $request->keterangan,
            'kedaluwarsa_bahan_kelola' => $request->kedaluwarsa_bahan_kelola,
            'jenis_pencatatan' => 'pemasukan_bahanbaku',
            //'id_user' => $request->id_user ?? 'ADM-001',
        ]);

        return redirect('/kelolabahanmasuk')->with('success', 'Data bahan masuk berhasil disimpan.');
    }

    public function bahan_keluar()
    {
        $dataBahanKeluar = KelolaBahanModel::select(
            'id_kelola_bb',
            'jenis_pencatatan',
            'mengelola_bahan.id_bahan',
            'jumlah_bahan',
            'keterangan',
            'kedaluwarsa_bahan_kelola',
            'mengelola_bahan.created_at',
            'mengelola_bahan.updated_at',
            'bahanbaku.nama_bahan',
            'bahanbaku.satuan'
        )
            ->join('bahanbaku', 'bahanbaku.id_bahan', '=', 'mengelola_bahan.id_bahan')
            ->where('jenis_pencatatan', 'pengeluaran_bahanbaku')
            ->get();

        $lastKeluar = KelolaBahanModel::where('jenis_pencatatan', 'pengeluaran_bahanbaku')
            ->orderBy('id_kelola_bb', 'desc')
            ->first();

        $lastNumber = $lastKeluar ? (int) substr($lastKeluar->id_kelola_bb, 3) : 0;
        $kodeOtomatis = 'BK-' . str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

        $list_bahan = BahanBakuModel::all();

        return view('KelolaBahan.bahanKeluar', compact('dataBahanKeluar', 'kodeOtomatis', 'list_bahan'));
    }

    public function tambah_bahan_keluar(Request $request)
    {
        $request->validate([
            'id_kelola_bb' => 'required|unique:mengelola_bahan,id_kelola_bb',
            'id_bahan' => 'required|exists:bahanbaku,id_bahan',
            'jumlah_bahan' => 'required|integer|min:1',
            'keterangan' => 'nullable|string|max:255',
            'kedaluwarsa_bahan_kelola' => 'nullable|date',
        ]);

        KelolaBahanModel::create([
            'id_kelola_bb' => $request->id_kelola_bb,
            'id_bahan' => $request->id_bahan,
            'jumlah_bahan' => $request->jumlah_bahan,
            'keterangan' => $request->keterangan,
            'kedaluwarsa_bahan_kelola' => $request->kedaluwarsa_bahan_kelola,
            'jenis_pencatatan' => 'pengeluaran_bahanbaku',
            //'id_user' => $request->id_user ?? 'ADM-001',
        ]);

        return redirect('/kelolabahankeluar')->with('success', 'Data bahan keluar berhasil disimpan.');
    }

    public function getNamaBahan($id_bahan)
    {
        $bahan = BahanBakuModel::find($id_bahan);
        return response()->json([
            'nama_bahan' => $bahan ? $bahan->nama_bahan : null
        ]);
    }
}
