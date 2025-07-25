<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\KelolaBahanModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;



class LaporanBahanController extends Controller
{

    public function laporan_bahan()
    {
        $data_laporanbahan = DB::table('mengelola_bahan')
            ->select(
                'mengelola_bahan.id_kelola_bb',
                DB::raw('DATE(mengelola_bahan.created_at) as tanggal'),
                'bahanbaku.nama_bahan',
                'mengelola_bahan.jumlah_bahan as jumlah',
                'mengelola_bahan.jenis_pencatatan'
            )
            ->leftJoin('bahanbaku', 'mengelola_bahan.id_bahan', '=', 'bahanbaku.id_bahan')
            ->get();

        $totalJumlah = $data_laporanbahan->sum('jumlah');

        $listbahan = DB::table('bahanbaku')->select('id_bahan')->get();

        $bahan_jenispencatatan = DB::table('mengelola_bahan')
            ->select('jenis_pencatatan')
            ->distinct()
            ->pluck('jenis_pencatatan');

        return view('laporan.bahan', compact('data_laporanbahan', 'totalJumlah', 'listbahan', 'bahan_jenispencatatan'));
    }



    public function rekapbahan()
    {
        $data_laporanbahan = DB::table('mengelola_bahan')
            ->select(
                'mengelola_bahan.id_kelola_bb',
                DB::raw('DATE(mengelola_bahan.created_at) as tanggal'),
                'bahanbaku.nama_bahan',
                'mengelola_bahan.jumlah_bahan as jumlah',
                'mengelola_bahan.jenis_pencatatan'
            )
            ->leftJoin('bahanbaku', 'mengelola_bahan.id_bahan', '=', 'bahanbaku.id_bahan');

        if (request()->filled('tanggal_awal')) {
            $data_laporanbahan->whereDate('mengelola_bahan.created_at', '>=', request('tanggal_awal'));
        }

        if (request()->filled('tanggal_akhir')) {
            $data_laporanbahan->whereDate('mengelola_bahan.created_at', '<=', request('tanggal_akhir'));
        }

        if (request()->has('id_bahan') && request('id_bahan') !== 'semua') {
            $data_laporanbahan->where('mengelola_bahan.id_bahan', request('id_bahan'));
        }

        if (request()->has('jenis_pencatatan') && request('jenis_pencatatan') !== 'semua') {
            $data_laporanbahan->where('mengelola_bahan.jenis_pencatatan', request('jenis_pencatatan'));
        }

        $rekap = $data_laporanbahan->orderBy('tanggal', 'asc')->get();

        $totalJumlah = $rekap->sum('jumlah');

        return response()->json([
            'data' => $rekap,
            'total_jumlah' => $totalJumlah
        ]);

    }

    public function bahan_Excel(Request $request)
    {
        $data_laporanbahan = DB::table('mengelola_bahan')
            ->select(
                'mengelola_bahan.id_kelola_bb',
                DB::raw('DATE(mengelola_bahan.created_at) as tanggal'),
                'bahanbaku.nama_bahan',
                'mengelola_bahan.jumlah_bahan as jumlah',
                'mengelola_bahan.jenis_pencatatan'
            )
            ->leftJoin('bahanbaku', 'mengelola_bahan.id_bahan', '=', 'bahanbaku.id_bahan');

        if ($request->filled('tanggal_awal')) {
            $data_laporanbahan->whereDate('mengelola_bahan.created_at', '>=', $request->tanggal_awal);
        }

        if ($request->filled('tanggal_akhir')) {
            $data_laporanbahan->whereDate('mengelola_bahan.created_at', '<=', $request->tanggal_akhir);
        }

        if ($request->filled('id_bahan') && $request->id_bahan !== 'semua') {
            $data_laporanbahan->where('mengelola_bahan.id_bahan', $request->id_bahan);
        }

        if ($request->filled('jenis_pencatatan') && $request->jenis_pencatatan !== 'semua') {
            $data_laporanbahan->where('mengelola_bahan.jenis_pencatatan', $request->jenis_pencatatan);
        }

        $data_laporanbahan = $data_laporanbahan
            ->orderBy('tanggal', 'asc')
            ->get();

        // Ekspor Excel
        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'ID Kelola BB');
        $sheet->setCellValue('C1', 'Tanggal');
        $sheet->setCellValue('D1', 'Nama bahan');
        $sheet->setCellValue('E1', 'Jumlah');
        $sheet->setCellValue('F1', 'Jenis Pencatatan');

        $row = 2;
        foreach ($data_laporanbahan as $i => $item) {
            $sheet->setCellValue('A' . $row, $i + 1);
            $sheet->setCellValue('B' . $row, $item->id_kelola_bb);
            $sheet->setCellValue('C' . $row, $item->tanggal);
            $sheet->setCellValue('D' . $row, $item->nama_bahan);
            $sheet->setCellValue('E' . $row, $item->jumlah);
            $sheet->setCellValue('F' . $row, $item->jenis_pencatatan);
            $row++;
        }

        // Output ke browser
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $filename = 'Laporanbahan_' . date('Ymd_His') . '.xlsx';
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header("Content-Disposition: attachment; filename=\"$filename\"");
        header('Cache-Control: max-age=0');
        $writer->save('php://output');
        exit;
    }

    public function bahan_pdf(Request $request)
    {
        $data_laporanbahan = DB::table('mengelola_bahan')
            ->select(
                'mengelola_bahan.id_kelola_bb',
                DB::raw('DATE(mengelola_bahan.created_at) as tanggal'),
                'bahanbaku.nama_bahan',
                'mengelola_bahan.jumlah_bahan as jumlah',
                'mengelola_bahan.jenis_pencatatan'
            )
            ->leftJoin('bahanbaku', 'mengelola_bahan.id_bahan', '=', 'bahanbaku.id_bahan');

        if ($request->filled('tanggal_awal')) {
            $data_laporanbahan->whereDate('mengelola_bahan.created_at', '>=', $request->tanggal_awal);
        }

        if ($request->filled('tanggal_akhir')) {
            $data_laporanbahan->whereDate('mengelola_bahan.created_at', '<=', $request->tanggal_akhir);
        }

        if ($request->filled('id_bahan') && $request->id_bahan !== 'semua') {
            $data_laporanbahan->where('mengelola_bahan.id_bahan', $request->id_bahan);
        }

        if ($request->filled('jenis_pencatatan') && $request->jenis_pencatatan !== 'semua') {
            $data_laporanbahan->where('mengelola_bahan.jenis_pencatatan', $request->jenis_pencatatan);
        }

        $data_laporanbahan = $data_laporanbahan
            ->orderBy('tanggal', 'asc')
            ->get();

        return view('laporan.list_databahan_pdf', compact('data_laporanbahan'));
    }


}