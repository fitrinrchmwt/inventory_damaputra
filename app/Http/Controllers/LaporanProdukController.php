<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KelolaProdukModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



class LaporanProdukController extends Controller
{

    public function laporan_produk()
    {
        $data_laporan = DB::table('mengelola_produk')
            ->select(
                'mengelola_produk.id_kelola_pr',
                DB::raw('DATE(mengelola_produk.created_at) as tanggal'),
                'produk.nama_produk',
                'mengelola_produk.jumlah_produk as jumlah',
                'mengelola_produk.jenis_pencatatan'
            )
            ->leftJoin('produk', 'mengelola_produk.id_produk', '=', 'produk.id_produk')
            ->get();

        $totalJumlah = $data_laporan->sum('jumlah');

        $listproduk = DB::table('produk')->select('id_produk', 'nama_produk')->get();

        $produk_jenispencatatan = DB::table('mengelola_produk')
            ->select('jenis_pencatatan')
            ->distinct()
            ->pluck('jenis_pencatatan');

        return view('laporan.produk', compact('data_laporan', 'totalJumlah', 'listproduk', 'produk_jenispencatatan'));
    }



    public function rekapproduk()
    {
        $data_laporan = DB::table('mengelola_produk')
            ->select(
                'mengelola_produk.id_kelola_pr',
                DB::raw('DATE(mengelola_produk.created_at) as tanggal'),
                'produk.nama_produk',
                'mengelola_produk.jumlah_produk as jumlah',
                'mengelola_produk.jenis_pencatatan'
            )
            ->leftJoin('produk', 'mengelola_produk.id_produk', '=', 'produk.id_produk');

        if (request()->filled('tanggal_awal')) {
            $data_laporan->whereDate('mengelola_produk.created_at', '>=', request('tanggal_awal'));
        }

        if (request()->filled('tanggal_akhir')) {
            $data_laporan->whereDate('mengelola_produk.created_at', '<=', request('tanggal_akhir'));
        }

        if (request()->has('id_produk') && request('id_produk') !== 'semua') {
            $data_laporan->where('mengelola_produk.id_produk', request('id_produk'));
        }

        if (request()->has('jenis_pencatatan') && request('jenis_pencatatan') !== 'semua') {
            $data_laporan->where('mengelola_produk.jenis_pencatatan', request('jenis_pencatatan'));
        }

        $rekap = $data_laporan->orderBy('tanggal', 'asc')->get();

        $totalJumlah = $rekap->sum('jumlah');

        return response()->json([
            'data' => $rekap,
            'total_jumlah' => $totalJumlah
        ]);

    }

    public function produk_Excel(Request $request)
    {
        $data_laporan = DB::table('mengelola_produk')
            ->select(
                'mengelola_produk.id_kelola_pr',
                DB::raw('DATE(mengelola_produk.created_at) as tanggal'),
                'produk.nama_produk',
                'mengelola_produk.jumlah_produk as jumlah',
                'mengelola_produk.jenis_pencatatan'
            )
            ->leftJoin('produk', 'mengelola_produk.id_produk', '=', 'produk.id_produk');

        if ($request->filled('tanggal_awal')) {
            $data_laporan->whereDate('mengelola_produk.created_at', '>=', $request->tanggal_awal);
        }

        if ($request->filled('tanggal_akhir')) {
            $data_laporan->whereDate('mengelola_produk.created_at', '<=', $request->tanggal_akhir);
        }

        if ($request->filled('id_produk') && $request->id_produk !== 'semua') {
            $data_laporan->where('mengelola_produk.id_produk', $request->id_produk);
        }

        if ($request->filled('jenis_pencatatan') && $request->jenis_pencatatan !== 'semua') {
            $data_laporan->where('mengelola_produk.jenis_pencatatan', $request->jenis_pencatatan);
        }

        $data_laporan = $data_laporan
            ->orderBy('tanggal', 'asc')
            ->get();

        // Ekspor Excel
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'ID Kelola PR');
        $sheet->setCellValue('C1', 'Tanggal');
        $sheet->setCellValue('D1', 'Nama produk');
        $sheet->setCellValue('E1', 'Jumlah');
        $sheet->setCellValue('F1', 'Jenis Pencatatan');

        $row = 2;
        foreach ($data_laporan as $i => $item) {
            $sheet->setCellValue('A' . $row, $i + 1);
            $sheet->setCellValue('B' . $row, $item->id_kelola_pr);
            $sheet->setCellValue('C' . $row, $item->tanggal);
            $sheet->setCellValue('D' . $row, $item->nama_produk);
            $sheet->setCellValue('E' . $row, $item->jumlah);
            $sheet->setCellValue('F' . $row, $item->jenis_pencatatan);
            $row++;
        }

        // Output ke browser
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'Laporanproduk_' . date('Ymd_His') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }

    public function produk_pdf(Request $request)
    {
        $data_laporan = DB::table('mengelola_produk')
            ->select(
                'mengelola_produk.id_kelola_pr',
                DB::raw('DATE(mengelola_produk.created_at) as tanggal'),
                'produk.nama_produk',
                'mengelola_produk.jumlah_produk as jumlah',
                'mengelola_produk.jenis_pencatatan'
            )
            ->leftJoin('produk', 'mengelola_produk.id_produk', '=', 'produk.id_produk');

        if ($request->filled('tanggal_awal')) {
            $data_laporan->whereDate('mengelola_produk.created_at', '>=', $request->tanggal_awal);
        }

        if ($request->filled('tanggal_akhir')) {
            $data_laporan->whereDate('mengelola_produk.created_at', '<=', $request->tanggal_akhir);
        }

        if ($request->filled('id_produk') && $request->id_produk !== 'semua') {
            $data_laporan->where('mengelola_produk.id_produk', $request->id_produk);
        }

        if ($request->filled('jenis_pencatatan') && $request->jenis_pencatatan !== 'semua') {
            $data_laporan->where('mengelola_produk.jenis_pencatatan', $request->jenis_pencatatan);
        }

        $data_laporan = $data_laporan
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('laporan.list_dataproduk_pdf', compact('data_laporan'));
    }


}
