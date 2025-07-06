@extends('template.form')

@section('title', 'Kelola Data Produk')

@section('content')

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Kelola Data Produk</h1>


        <!-- Main Content -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold" style="color: #5b2a3d;">Data Produk</h6>
            </div>


            <div class="card-body">
                <!-- Data Table -->


                <!-- Modal -->
                <!-- Include modal dari file terpisah -->
                @include('produk.form')
                <!-- Tambah Pencatatan -->
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-damava shadow-sm"
                            style="padding: 10px; margin-bottom: 10px;" data-bs-toggle="modal"
                            data-bs-target="#ProdukModal">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
                        </a>
                    </div>
                </div>

                <!-- End Modal -->

                <!-- Table -->
                <div style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-bordered table-striped text-center" id="dataTable" width="100%"
                        cellspacing="0">

                        <thead style="background-color: #99627A; color: white;" class="text-center">
                            <tr class="text-center">
                                <th>No.</th>
                                <th>ID Produk</th>
                                <th>Nama Produk</th>
                                <th>Satuan</th>
                                <th>Stok Produk</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($dataProduk as $key => $produk)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $produk->id_produk }}</td>
                                    <td>{{ $produk->nama_produk }}</td>
                                    <td>{{ $produk->satuan }}</td>
                                    <td>{{ $produk->stok_produk }}</td>
                                    <td width="35%">
                                        <!-- Tombol Detail -->
                                        <a href="#" class="d-none d-sm-inline-block btn btn-info shadow-sm"
                                            data-bs-toggle="modal" data-bs-target="#detailProdukModal">
                                            <i class="fas fa-file-alt fa-sm text-white-50"></i> Detail
                                        </a> |

                                        <!-- Tombol Edit -->
                                        <a href="updateproduk/{{ $produk->id_produk }}"
                                            class="d-none d-sm-inline-block btn btn-warning shadow-sm edit-product-btn"
                                            data-bs-toggle="modal" data-bs-target="#editProdukModal"
                                            id_produk="{{ $produk->id_produk }}" nama_produk="{{ $produk->nama_produk }}"
                                            data-satuan="{{ $produk->satuan }}" stok_produk="{{ $produk->stok_produk }}">
                                            <i class="fas fa-edit fa-sm text-white-50"></i> Edit </a> |

                                        <!-- Tombol Hapus -->
                                        <a href="javascript:void(0);" onclick="hapusData('{{ $produk->id_produk }}')"
                                            class="d-none d-sm-inline-block btn btn-danger shadow-sm">
                                            <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus
                                        </a>
                                    </td>

                                </tr>

                            @endforeach
                            <tr>
                                <td colspan="4"><strong>Total</strong></td>
                                <td><strong>{{ $dataProduk->sum('stok_produk') }}</strong></td>
                                <td></td>
                            </tr>

                        </tbody>
                    </table>

                    @if ($data){
                        @include('produk.formEditProduk')
                        @include('produk.detailProduk')
                        }

                    @endif
                    <!-- Modal Edit Start -->

                    <!-- Modal Edit End -->

                    <!-- Modal Detail Start -->
                    

                    <!-- Modal Detail End -->


                </div>

            </div>
        </div>

    </div>
    <!-- /.container-fluid -->


@endsection