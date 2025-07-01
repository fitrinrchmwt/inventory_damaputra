@extends('template.form')

@section('title', 'Kelola Data Bahan Baku')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Kelola Data Bahan Baku</h1>


        <!-- Main Content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold" style="color: #5b2a3d;">Data Bahan Baku</h6>
            </div>


            <div class="card-body">
                <!-- Data Table -->
                <div class="table-responsive">
                    <!-- Tambah Pencatatan -->
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-damava shadow-sm"
                                style="padding: 10px; margin-bottom: 10px;" data-bs-toggle="modal"
                                data-bs-target="#BahanModal">
                                <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
                            </a>
                        </div>
                    </div>
                    <!-- Modal -->
                    <!-- Include modal dari file terpisah -->
                    @include('bahan.form')

                    <!-- End Modal -->




                    <!-- Table -->
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Bahan</th>
                                <th>Nama Bahan</th>
                                <th>Satuan</th>
                                <th>Stok Bahan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>BB-001</td>
                                <td>Abon Ayam</td>
                                <td>Kg</td>
                                <td class="highlight">0</td>
                                <td width="35%"><a href="#" class="d-none d-sm-inline-block btn btn-info shadow-sm"
                                        data-bs-toggle="modal" data-bs-target="#detailBahanModal">
                                        <i class="fas fa-file-alt fa-sm text-white-50"></i> Detail</a> | <a href="#"
                                        class="d-none d-sm-inline-block btn btn-warning shadow-sm" data-bs-toggle="modal"
                                        data-bs-target="#editBahanModal">
                                        <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a> |
                                    <a href="javascript:void(0);" onclick="hapusData('123')"
                                        class="d-none d-sm-inline-block btn btn-danger shadow-sm">
                                        <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus
                                    </a>
                                </td>

                            </tr>
                            <tr>
                                <td colspan=""><strong>Total</strong></td>
                                <td colspan=""></td>
                                <td colspan=""></td>
                                <td colspan=""></td>
                                <td class="">0</td>
                                <td colspan=""></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- Modal Detail Start -->
                    @include('bahan.detailBahan')

                    <!-- Modal Detail End -->

                    <!-- Modal edit Start -->
                    @include('bahan.formEdit')
                    <!-- Modal End -->
                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection