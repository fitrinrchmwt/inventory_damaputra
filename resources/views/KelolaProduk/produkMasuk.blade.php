@extends('template.form')

@section('title', 'Kelola Produk Masuk')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola Produk Masuk</h1>
                    

    <!-- Main Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #5b2a3d;">Riwayat Produk Masuk</h6>
        </div>      
                        
        
        <div class="card-body">
            <!-- Data Table -->
            <div class="table-responsive">
                <div class="row">

                    <!-- Tambah Pencatatan -->
                    <div class="col-sm-12 col-md-6">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-damava shadow-sm" style="padding: 10px; margin-bottom: 10px;" data-bs-toggle="modal" data-bs-target="#modalProdukMasuk">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pencatatan
                        </a>
                    </div>
                </div>
                <!-- Modal -->
                <!-- Include modal dari file terpisah -->
                @include('KelolaProduk.formProdukMasuk')

                <!-- End Modal -->


                

                <!-- Table -->
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID Produk</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>PR-001</td>
                            <td class="highlight">10</td>
                            <td>Retur Toko Bunga</td>
                            <td><a href="#" class="d-none d-sm-inline-block btn btn-info shadow-sm" data-bs-toggle="modal" data-bs-target="#detailProdukMasukModal">
                            <i class="fas fa-file-alt fa-sm text-white-50"></i> Detail</a></td>
                            
                        </tr>
                        <tr>
                            <td colspan=""><strong>Total</strong></td>
                            <td colspan=""></td>
                            <td colspan=""></td>
                            <td class="">10</td>
                            <td colspan=""></td>
                        </tr>      
                    </tbody>
                </table>
                <!-- Modal -->   
                 <!-- Include modal dari file terpisah -->
                @include('KelolaProduk.detailProdukMasuk')

                <!-- End Modal -->                           
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


@endsection