@extends('template.form')

@section('title', 'Kelola Bahan Keluar')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Kelola Bahan Keluar</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold" style="color: #5b2a3d;">Riwayat Bahan Keluar</h6>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <a href="#" class="btn btn-sm btn-damava shadow-sm" style="padding: 10px; margin-bottom: 10px;"
                            data-bs-toggle="modal" data-bs-target="#modalBahanKeluar">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Pencatatan
                        </a>
                    </div>
                </div>

                @include('KelolaBahan.formBahanKeluar')

                <div style="max-height: 400px; overflow-y: auto;">
                    <table class="table table-bordered table-striped text-center" width="100%" cellspacing="0">
                        <thead style="background-color: #99627A; color: white;">
                            <tr>
                                <th>No.</th>
                                <th>ID Bahan Keluar</th>
                                <th>Nama Bahan</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $total = 0; @endphp
                            @foreach ($dataBahanKeluar as $index => $bahan)
                                @if ($bahan->jenis_pencatatan == 'pengeluaran_bahanbaku')
                                    @php $total += $bahan->jumlah_bahan; @endphp
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $bahan->id_kelola_bb }}</td>
                                        <td>{{ $bahan->nama_bahan }}</td>
                                        <td>{{ $bahan->jumlah_bahan }}</td>
                                        <td>{{ $bahan->keterangan }}</td>
                                        <td>{{ $bahan->kedaluwarsa_bahan_kelola ? \Carbon\Carbon::parse($bahan->kedaluwarsa_bahan_kelola)->format('d/m/Y') : '-' }}
                                        </td>
                                        <td>
                                            <a href="#" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#detailBahanKeluarModal{{ $bahan->id_kelola_bb }}">
                                                <i class="fas fa-file-alt fa-sm text-white-50"></i> Detail</a>

                                            <!-- Modal Detail -->
                                            <div class="modal fade" id="detailBahanKeluarModal{{ $bahan->id_kelola_bb }}"
                                                tabindex="-1" aria-labelledby="modalLabel{{ $bahan->id_kelola_bb }}"
                                                aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="modalLabel{{ $bahan->id_bahan }}">Detail Bahan Keluar</h5>
                                                            <button type="button" class="close" data-bs-dismiss="modal"aria-label="Tutup">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td>ID Kelola Bahan</td>
                                                                    <td>{{ $bahan->id_kelola_bb }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ID Bahan</td>
                                                                    <td>{{ $bahan->id_bahan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Nama Bahan</td>
                                                                    <td>{{ $bahan->nama_bahan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Satuan</td>
                                                                    <td>{{ ucfirst($bahan->satuan) }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Jumlah</td>
                                                                    <td>{{ $bahan->jumlah_bahan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Keterangan</td>
                                                                    <td>{{ $bahan->keterangan }}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Created At</td>
                                                                    <td>{{ $bahan->created_at ? $bahan->created_at->format('d/m/Y') : '-' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Updated At</td>
                                                                    <td>{{ $bahan->updated_at ? $bahan->updated_at->format('d/m/Y') : '-' }}
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>ID User</td>
                                                                    <td>{{ $bahan->id_user ?? '-' }}</td>
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
