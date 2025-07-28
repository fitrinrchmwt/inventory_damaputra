<?php

namespace App\Http\Controllers;

use App\Models\KelolaProdukModel;
use App\Models\KelolaBahanModel;
use App\Models\ProdukModel;
use App\Models\BahanBakuModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;


class DashboardController extends Controller
{
    //     public function dashboard()
// {
//     $pencatatanTerbaru = app(KelolaProdukController::class)->getPencatatanTerbaru();

    //      // Ambil produk dengan stok kurang dari 20 (misalnya batas minimum stok)
//     $notifikasiStokKurang = ProdukModel::where('stok_produk', '<', 20)
//         ->orderBy('stok_produk', 'asc')
//         ->get();

    //     return view('home.dashboard', compact('notifikasiStokKurang','pencatatanTerbaru'));
// }

    public function dashboard()
    {
        // Notifikasi stok kurang dari produk
        $notifikasiStokProduk = ProdukModel::where('stok_produk', '<', 20)
            ->orderBy('stok_produk', 'asc')
            ->get()
            ->map(function ($item) {
                $item->tipe = 'produk';
                return $item;
            });

        // Notifikasi stok kurang dari bahan baku
        $notifikasiStokBahan = BahanBakuModel::where('stok_bahan', '<', 20)
            ->orderBy('stok_bahan', 'asc')
            ->get()
            ->map(function ($item) {
                $item->tipe = 'bahan';
                return $item;
            });

        // Gabungkan keduanya
        $notifikasiStokKurang = $notifikasiStokProduk->concat($notifikasiStokBahan);



        $pencatatanProduk = KelolaProdukModel::with('produk')
            ->latest()
            ->take(10)
            ->get();

        $pencatatanBahan = KelolaBahanModel::with('bahanbaku')
            ->latest()
            ->take(10)
            ->get();

        // Tandai tipe masing-masing agar bisa dibedakan di blade
        $pencatatanProduk->each(function ($item) {
            $item->tipe = 'produk';
        });

        $pencatatanBahan->each(function ($item) {
            $item->tipe = 'bahanbaku';
        });

        $pencatatanTerbaru = $pencatatanProduk
            ->merge($pencatatanBahan)
            ->sortByDesc('created_at')
            ->take(10);

        
    
    

   

        $totalProduk = ProdukModel::count();
        $totalStokProduk = ProdukModel::sum('stok_produk');
        $produkmasuk = KelolaProdukModel::where('jenis_pencatatan', 'pemasukan_produk')
        ->sum('jumlah_produk');
        $produkkeluar = KelolaProdukModel::where('jenis_pencatatan', 'pengeluaran_produk')
        ->sum('jumlah_produk');
        $totalBahan = BahanBakuModel::count();
        $totalStokBahan = BahanBakuModel::sum('stok_bahan');
        $bahanmasuk = KelolaBahanModel::where('jenis_pencatatan', 'pemasukan_bahanbaku')
        ->sum('jumlah_bahan');
        $bahankeluar = KelolaBahanModel::where('jenis_pencatatan', 'pengeluaran_bahanbaku')
        ->sum('jumlah_bahan');

        $bulanIni = Carbon::now()->format('Y-m'); // contoh: '2025-07'

        $penjualanPerProduk = KelolaProdukModel::select('produk.nama_produk', DB::raw('SUM(jumlah_produk) as total_terjual'))
            ->join('produk', 'produk.id_produk', '=', 'mengelola_produk.id_produk')
            ->where('jenis_pencatatan', 'pengeluaran_produk')
            ->whereMonth('mengelola_produk.created_at', Carbon::now()->month)
            ->whereYear('mengelola_produk.created_at', Carbon::now()->year)
            ->groupBy('produk.nama_produk')
            ->get();

        // Siapkan data untuk chart
        $labels = $penjualanPerProduk->pluck('nama_produk');
        $data = $penjualanPerProduk->pluck('total_terjual');

        return view('home.dashboard', compact('notifikasiStokKurang','pencatatanTerbaru','totalProduk', 'totalStokProduk', 'produkmasuk','produkkeluar', 'totalBahan','totalStokBahan','bahanmasuk','bahankeluar','labels', 'data'));
    }

}
