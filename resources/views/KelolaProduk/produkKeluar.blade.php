@extends('template.form')

@section('title', 'Kelola Produk Keluar')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Kelola Produk Keluar</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold" style="color: #5b2a3d;">Riwayat Produk Keluar</h6>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <a href="#" class="btn btn-sm btn-damava shadow-sm" style="padding: 10px; margin-bottom: 10px;"
                            data-bs-toggle="modal" data-bs-target="#modalProdukKeluar">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pencatatan
                        </a>
                    </div>
                </div>

                @include('KelolaProduk.formProdukKeluar')

                <div style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-bordered table-striped text-center" width="100%" cellspacing="0">
                        <thead style="background-color: #99627A; color: white;">
                            <tr>
                                <th>No.</th>
                                <th>ID Produk Keluar</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach ($dataProdukKeluar as $index => $produk)
                                @if ($produk->jenis_pencatatan == 'pengeluaran_produk')
                                    @php $total += $produk->jumlah_produk; @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $produk->id_kelola_pr }}</td>
                                        <td>{{ $produk->nama_produk }}</td>
                                        <td>{{ $produk->jumlah_produk }}</td>
                                        <td>{{ $produk->keterangan }}</td>
                                        
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#detailProdukKeluarModal{{ $produk->id_kelola_pr }}">
                                                <i class="fas fa-file-alt fa-sm text-white-50"></i> Detail
                                            </a>

                                            <!-- Modal Detail -->
                                            <div class="modal fade" id="detailProdukKeluarModal{{ $produk->id_kelola_pr }}"
                                                tabindex="-1" aria-labelledby="modalLabel{{ $produk->id_kelola_pr }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalLabel{{ $produk->id_produk }}">Detail
                                                                Produk Keluar</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"
                                                                aria-label="Tutup">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>ID Kelola Produk</td>
                                                                    <td>{{ $produk->id_kelola_pr }}</td>
                                                                </tr>
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
                                                                    <td>Jumlah</td>
                                                                    <td>{{ $produk->jumlah_produk }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Keterangan</td>
                                                                    <td>{{ $produk->keterangan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>kadaluarsa</td>
                                                                    <td>{{ $produk->kedaluwarsa_produk_kelola ? \Carbon\Carbon::parse($produk->kedaluwarsa_produk_kelola)->format('d/m/Y') : '-' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Created At</td>
                                                                    <td>{{ $produk->created_at ? $produk->created_at->format('d/m/Y') : '-' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Updated At</td>
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

                                @endif
                            @endforeach
                            <tr>
                                <td colspan="3"><strong>Total</strong></td>
                                <td><strong>{{ $total }}</strong></td>
                                <td colspan="3"></td>
                            </tr>
                        </tbody>
                    </table>
                </div>




            </div>
        </div>
    </div>
@endsection
