@extends('template.section')

@section('title', 'Dashboard')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <a style="color : #CD5656" href="">Data Produk</a>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalProduk }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Stok Produk</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalStokProduk }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-store fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Produk Masuk
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $produkmasuk }}</div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Produk Keluar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $produkkeluar }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                    <a style="color : #CD5656" href="">Data Bahan</a>
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalBahan }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-database fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                    Stok Bahan</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalStokBahan }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-store fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Bahan Masuk
                                </div>
                                <div class="row no-gutters align-items-center">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $bahanmasuk }}</div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                    Bahan Keluar</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $bahankeluar }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Content Row -->

        <div class="row">
            <!-- Notifikasi Stok Kurang -->

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-10">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold" style="color: #5b2a3d;">Notifikasi Stok Kurang</h6>
                    </div>
                    <div class="card-body">
                        <!-- <div style="max-height: 300px; overflow-y: auto;">
                                    <table class="table table-bordered">
                                        <thead style="background-color: #99627A; color: white;" class="text-center">
                                            <tr>
                                                <th>No.</th>
                                                <th>ID Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Stok</th>
                                                <th>Jenis</th>
                                            </tr>
                                        </thead> -->
                        <div style="max-height: 300px; overflow-y: auto;">
                            <table class="table table-bordered text-center"
                                style="border-collapse: separate; border-spacing: 0;">
                                <thead
                                    style="background-color: #99627A; color: white; position: sticky; top: 0; z-index: 1;">
                                    <tr>
                                        <th style="background-color: #99627A;">No</th>
                                        <th style="background-color: #99627A;">ID Data</th>
                                        <th style="background-color: #99627A;">Nama</th>
                                        <th style="background-color: #99627A;">Stok</th>
                                        <th style="background-color: #99627A;">Jenis</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @forelse ($notifikasiStokKurang as $index => $item)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>
                                                @if ($item->tipe == 'produk')
                                                    {{ $item->id_produk }}
                                                @else
                                                    {{ $item->id_bahan }}
                                                @endif
                                            </td>
                                            <td>
                                                @if ($item->tipe == 'produk')
                                                    {{ $item->nama_produk }}
                                                @else
                                                    {{ $item->nama_bahan }}
                                                @endif
                                            </td>
                                            <td
                                                class="{{ ($item->tipe == 'produk' ? $item->stok_produk : $item->stok_bahan) <= 5 ? 'highlight-red' : 'highlight-orange' }}">
                                                {{ $item->tipe == 'produk' ? $item->stok_produk : $item->stok_bahan }}
                                            </td>
                                            <td>
                                                @if ($item->tipe == 'produk')
                                                    <span class="badge bg-primary text-white">Produk</span>
                                                @else
                                                    <span class="badge bg-info text-white">Bahan</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5">Semua stok mencukupi</td>
                                        </tr>
                                    @endforelse
                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <!-- Area Chart -->
                    <div class="col-xl-12 col-lg-10">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold" style="color: #5b2a3d;">10 Pencatatan Stok Terakhir</h6>

                            </div>
                            <!-- <div class="card-header bg-primary text-white">
                                                        <h5 class="mb-0">10 Pencatatan Stok Terakhir</h5>
                                                    </div> -->
                            <div class="card-body p-0">
                                <!-- <div style="max-height: 300px; overflow-y: auto;">
                                        <table class="table table-bordered ">
                                            <thead style="background-color: #99627A; color: white;" class="text-center">
                                                <tr>
                                                    <th>No</th>
                                                    <th>ID Kelola</th>
                                                    <th>Nama</th>
                                                    <th>Jumlah</th>
                                                    <th>Jenis</th>
                                                    <th>Keterangan</th>
                                                    <th>Tanggal</th>
                                                </tr>
                                            </thead> -->
                                <div style="max-height: 300px; overflow-y: auto;">
                                    <table class="table table-bordered text-center"
                                        style="border-collapse: separate; border-spacing: 0;">
                                        <thead
                                            style="background-color: #99627A; color: white; position: sticky; top: 0; z-index: 1;">
                                            <tr>
                                                <th style="background-color: #99627A;">No</th>
                                                <th style="background-color: #99627A;">ID Kelola</th>
                                                <th style="background-color: #99627A;">Nama</th>
                                                <th style="background-color: #99627A;">Jumlah</th>
                                                <th style="background-color: #99627A;">Jenis Pencatatan</th>
                                                <th style="background-color: #99627A;">Keterangan</th>
                                                <th style="background-color: #99627A;">Tanggal</th>
                                            </tr>
                                        </thead>

                                        <tbody class="text-center">
                                            @forelse($pencatatanTerbaru as $i => $item)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $item->tipe == 'produk' ? $item->id_kelola_pr : $item->id_kelola_bb }}
                                                    </td>
                                                    <td>
                                                        @if ($item->tipe == 'produk')
                                                            {{ $item->produk->nama_produk ?? '-' }}
                                                        @else
                                                            {{ $item->bahanbaku->nama_bahan ?? '-' }}
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->jumlah_produk ?? $item->jumlah_bahan }}</td>
                                                    <td>
                                                        @if ($item->tipe == 'produk')
                                                            @if($item->jenis_pencatatan == 'pemasukan_produk')
                                                                <span class="badge bg-success text-white">Produk Masuk</span>
                                                            @else
                                                                <span class="badge bg-danger text-white">Produk Keluar</span>
                                                            @endif
                                                        @else
                                                            @if($item->jenis_pencatatan == 'pemasukan_bahanbaku')
                                                                <span class="badge bg-success text-white">Bahan Masuk</span>
                                                            @else
                                                                <span class="badge bg-danger text-white">Bahan Keluar</span>
                                                            @endif
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->keterangan ?? '-' }}</td>
                                                    <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d-m-Y H:i') }}</td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="7" class="text-center">Tidak ada data</td>
                                                </tr>
                                            @endforelse
                                        </tbody>

                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- Area Chart dari js/demo/chart-area-demo-js -->
                            <div class="col-xl-8 col-lg-7">

                                <!-- Area Chart -->
                                <!-- Iki sek di edit fittt -->
                                <div class="card shadow mb-4">
                                    <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Grafik Pencatatan Bulan Ini</h6>
                                    </div>
                                    <div class="card-body">
                                        <div class="chart-area">
                                            <div id="no-data-message"
                                                style="display: none; text-align:center; color: red; font-weight: bold; padding-top:150px;">
                                                Belum ada Pencatatan untuk bulan ini.
                                            </div>
                                            <canvas id="myAreaChart" width="100%" height="30"></canvas>
                                        </div>
                                        <hr>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                </div>

            </div>
            <!-- /.container-fluid -->
@endsection


        @section('script')
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                const labels = {!! json_encode($labels) !!};
                const data = {!! json_encode($data) !!};

                const messageDiv = document.getElementById("no-data-message");
                const chartCanvas = document.getElementById("myAreaChart");

                if (labels.length === 0 || data.length === 0) {
                    messageDiv.style.display = "block";
                    chartCanvas.style.display = "none"; // sembunyikan canvas chart
                } else {
                    messageDiv.style.display = "none";
                    const ctx = chartCanvas.getContext('2d');
                    const myChart = new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'Jumlah Penjualan',
                                data: data,
                                backgroundColor: 'rgba(78, 115, 223, 0.2)',
                                borderColor: 'rgba(78, 115, 223, 1)',
                                borderWidth: 2,
                                pointRadius: 3,
                                pointBackgroundColor: 'rgba(78, 115, 223, 1)',
                                pointBorderColor: 'rgba(78, 115, 223, 1)',
                                pointHoverRadius: 5,
                                pointHoverBackgroundColor: 'rgba(78, 115, 223, 1)',
                                pointHoverBorderColor: 'rgba(78, 115, 223, 1)',
                                pointHitRadius: 10,
                                pointBorderWidth: 2,
                                fill: true
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }
            </script>
        @endsection