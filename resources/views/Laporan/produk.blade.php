@extends('template.form')

@section('title', 'Laporan Produk')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan Produk</h1>
                    

    <!-- Main Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #5b2a3d;">Data Pencatatan</h6>
        </div>      
                        
        
        <div class="card-body">
            <!-- Data Table -->
            <div class="table-responsive">
                <!-- Tambah Pencatatan -->
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-damava shadow-sm" style="padding: 10px; margin-bottom: 10px;" data-bs-toggle="modal" data-bs-target="#UserModal">
                            <i class="fas fa-download fa-sm text-white-50"></i> Download Laporan
                        </a>
                    </div>
                </div>
                

                <!-- search -->
                <div class="d-sm-inline-block m-3" >
                   <select name="satuan" id="satuan" class="form-control" required>
                        <option value="">-- Jenis Pencatatan --</option>
                        <option value="">Semua</option>
                        <option value="">Produk Masuk</option>
                        <option value="">Produk Keluar</option>
                    </select>
                </div>
                <div class="d-sm-inline-block m-3" >
                   <select name="satuan" id="satuan" class="form-control" required>
                        <option value="">-- ID Produk --</option>
                        <option value="">Semua</option>
                        <option value="">PR-001</option>
                        <option value="">PR-002</option>
                    </select>
                </div>
                <div class="d-sm-inline-block m-3" >
                   <input type="date" name="tanggalmulai" class="form-control" placeholder="Tanggal Mulai">
                </div>
                /
                <div class="d-sm-inline-block" >
                    <input type="date" name="tanggalakhir" class="form-control" placeholder="Tanggal Akhir">
                </div>

                <!-- Table -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Id Pencatatan</th>
                            <th>Tanggal</th>
                            <th>ID Produk</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>PM-001</td>
                            <td>16/06/2025</td>
                            <td>PR-001</td>
                            <td class="highlight">10</td>
                            <td>Retur Toko Bunga</td>
                        </tr>
                        <tr>
                            <td colspan=""><strong>Total</strong></td>
                            <td colspan=""></td>
                            <td colspan=""></td>
                            <td class="">10</td>
                            <td colspan=""></td>
                            <td colspan=""></td>
                        </tr>      
                    </tbody>
                </table>                            
            </div>
            
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection