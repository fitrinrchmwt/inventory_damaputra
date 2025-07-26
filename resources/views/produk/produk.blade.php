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
                <div class="scroll-table-container">
                    <table class="table table-bordered table-striped text-center" id="tabel-produk">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Produk</th>
                                <th>Nama Produk</th>
                                <th>Satuan</th>
                                <th>Stok</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($dataProduk as $key => $produk)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $produk->id_produk }}</td>
                                    <td>{{ $produk->nama_produk }}</td>
                                    <td>{{ $produk->satuan }}</td>
                                    <td width="12%">{{ $produk->stok_produk }}</td>
                                    <td width="28%">
                                        <!-- Tombol Detail -->
                                        <a href="#" class=" btn btn-info btn-sm shadow-sm" data-bs-toggle="modal"
                                            data-bs-toggle="modal" data-bs-target="#detailProdukModal{{ $produk->id_produk }}"">
                                                     <i class=" fas fa-file-alt fa-sm text-white-50"></i>Detail</a> |

                                        <!-- Tombol Edit -->
                                        <a href="#" class=" btn btn-warning btn-sm shadow-sm edit-product-btn"
                                            data-bs-toggle="modal" data-bs-target="#editProdukModal"
                                            data-id_produk="{{ $produk->id_produk }}"
                                            data-nama_produk="{{ $produk->nama_produk }}" data-satuan="{{ $produk->satuan }}"
                                            data-stok_produk="{{ $produk->stok_produk }}">
                                            <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                                        </a>
                                        |

                                        <!-- Tombol Hapus -->
                                        <form action="{{ route('produk.delete', $produk->id_produk) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm shadow-sm edit-product-btn"
                                                data-bs-toggle="modal" data-bs-target="#hapusProdukModal"
                                                onclick="return confirm('Yakin ingin menghapus produk ini?')">
                                                <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</button>
                                        </form>

                                        <!-- Modal Detail -->
                                        <div class="modal fade" id="detailProdukModal{{ $produk->id_produk }}" tabindex="-1"
                                            aria-labelledby="modalLabel{{ $produk->id_produk }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel{{ $produk->id_produk }}">Detail
                                                            Produk</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Tutup">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
                                                            <tr>
                                                                <td>ID Produk</td>
                                                                <td>{{ $produk->id_produk }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Nama Produk</td>
                                                                <td>{{ $produk->nama_produk }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Satuan</td>
                                                                <td>{{ ucfirst($produk->satuan) }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Stok Produk</td>
                                                                <td>{{ $produk->stok_produk }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal Input Data </td>
                                                                <td>{{ $produk->created_at ? $produk->created_at->format('d/m/Y') : '-' }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal Edit</td>
                                                                <td>{{ $produk->updated_at ? $produk->updated_at->format('d/m/Y') : '-' }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>ID User</td>
                                                                <td>{{ $produk->id_user ?? '-' }}</td>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Tutup</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal Detail End -->




                                    </td>

                                </tr>

                            @empty
                                <tr>
                                    <td colspan="6">Data Tidak Ada</td>
                                </tr>
                            @endforelse
                            @if ($dataProduk->count() > 0)
                                <tr>
                                    <td colspan="4"><strong>Total</strong></td>
                                    <td><strong>{{ $dataProduk->sum('stok_produk') }}</strong></td>
                                    <td></td>
                                </tr>
                            @endif
                            <!-- SweetAlert2 CDN -->
                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                        </tbody>
                    </table>

                    <div id="alert-notifikasi" class="alert alert-success alert-dismissible fade show d-none" role="alert">
                        <span id="alert-message"></span>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
                    </div>
                    @if (session('success'))
                        <script>
                            Swal.fire({
                                title: 'Sukses!',
                                text: '{{ session('success') }}',
                                icon: 'success',
                                confirmButtonText: 'OK'
                            });
                        </script>
                    @endif

                    <!-- @if (session('error'))
                            <script>
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: '{{ session('error') }}',
                                    confirmButtonColor: '#d33'
                                });
                            </script>
                        @endif -->


                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const buttons = document.querySelectorAll('.edit-product-btn');

                            buttons.forEach(button => {
                                button.addEventListener('click', function () {
                                    document.getElementById('edit_id_produk').value = this.dataset.id_produk;
                                    document.getElementById('edit_nama_produk').value = this.dataset.nama_produk;
                                    document.getElementById('edit_satuan').value = this.dataset.satuan;
                                    document.getElementById('edit_stok_produk').value = this.dataset.stok_produk;
                                });
                            });
                        });
                    </script>




                    @include('produk.formEditProduk')
                    @include('produk.detailProduk')



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