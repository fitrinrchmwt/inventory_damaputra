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




                <form id="formFilterProdukKeluar" class="row mb-3 formFilterProdukKeluar">
                    <div class="col-md-3">
                        <label>Nama Produk</label>
                        <input type="text" class="form-control" id="filter_nama_produk" placeholder="Masukan Nama Produk">
                    </div>
                    <div class="col-md-3">
                        <label>Tanggal Pencatatan</label>
                        <input type="date" class="form-control" id="filter_tanggal">
                    </div>
                    <div class="col-md-3 pt-4 btnFilter" id="btnFilter">
                        <button type="button" class="btn btn-damava mt-2">
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </form>




                @include('KelolaProduk.formProdukKeluar')

                <div class="scroll-table-container">
                    <table class="table table-bordered table-striped text-center" id="tabel-produk">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Produk Keluar</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Status Kadaluarsa</th>
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
                                        <!--status kedaluwarsa-->
                                        <td class="text-white">
                                            @php
                                                $kadaluarsa = \Carbon\Carbon::parse($produk->kedaluwarsa_produk_kelola);
                                                $hariIni = \Carbon\Carbon::now();
                                                $selisihHari = $hariIni->diffInDays($kadaluarsa, false);
                                            @endphp


                                            @if ($selisihHari < 0)
                                                <span class="badge bg-danger">Kedaluwarsa</span>
                                            @elseif ($selisihHari < 7)
                                                <span class="badge bg-warning text-white">Hampir Kedaluwarsa</span>
                                            @else
                                                <span class="badge bg-success">Belum Kedaluwarsa</span>
                                            @endif
                                        </td>

                                        <td>
                                            <a href="#" class="btn btn-info btn-sm shadow-sm" data-bs-toggle="modal"
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
                                                                    <td>Tanggal Pencatatan</td>
                                                                    <td>{{ $produk->created_at ? $produk->created_at->format('d/m/Y') : '-' }}
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $('#btnFilter').click(function () {
            var nama_produk = $('#filter_nama_produk').val();
            var tanggal = $('#filter_tanggal').val();

            $.ajax({
                url: '{{ url("/produk-keluar/filter") }}',
                type: 'GET',
                data: {
                    nama_produk: nama_produk,
                    tanggal: tanggal
                },
                success: function (response) {
                    let rows = '';
                    let total = 0;
                    let no = 1;

                    if (response.status === 'success') {
                        if (response.data.length > 0) {
                            $.each(response.data, function (index, item) {
                                total += parseInt(item.jumlah_produk);

                                let status = '-';
                                if (item.kedaluwarsa_produk_kelola) {
                                    let expired = new Date(item.kedaluwarsa_produk_kelola);
                                    let now = new Date();
                                    let diff = (expired - now) / (1000 * 60 * 60 * 24);

                                    if (diff < 0) {
                                        status = '<span class="badge bg-danger text-white">Kedaluwarsa</span>'
                                    } else if (diff < 7) {
                                        status = '<span class="badge bg-warning text-white">Hampir Kedaluwarsa</span>'
                                    } else {
                                        status = '<span class="badge bg-success text-white">Belum Kedaluwarsa</span>'
                                    }
                                }

                                rows += `<tr>
                                                <td>${no++}</td>
                                                <td>${item.id_kelola_pr}</td>
                                                <td>${item.produk?.nama_produk ?? '-'}</td>
                                                <td>${item.jumlah_produk}</td>
                                                <td>${item.keterangan ?? '-'}</td>
                                                <td>
                                                        <a href="#" class="btn btn-info btn-sm shadow-sm" data-bs-toggle="modal"
                                                            data-bs-target="#detailProdukMasukModal${item.id_kelola_pr}">
                                                            <i class="fas fa-file-alt fa-sm text-white-50"></i> Detail
                                                        </a>

                                                        <!-- Modal Detail -->
                                                        <div class="modal fade" id="detailProdukMasukModal${item.id_kelola_pr}"
                                                            tabindex="-1" aria-labelledby="modalLabel${item.id_kelola_pr}"
                                                            aria-hidden="true">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="modalLabel${item.id_produk}">Detail
                                                                            Produk Masuk</h5>
                                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                                            aria-label="Tutup">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <table class="table table-bordered">
                                                                            <tr>
                                                                                <td>ID Kelola Produk</td>
                                                                                <td>${item.id_kelola_pr}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>ID Produk</td>
                                                                                <td>${item.id_produk}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Nama Produk</td>
                                                                                <td>${item.produk.nama_produk}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Satuan</td>
                                                                                <td>${item.produk.satuan}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Jumlah</td>
                                                                                <td>${item.jumlah_produk}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Keterangan</td>
                                                                                <td>${item.keterangan}</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>kedaluwarsa</td>
                                                                                <td>${item.kedaluwarsa_produk_kelola ? moment.utc(item.kedaluwarsa_produk_kelola).format('DD/MM/YYYY') : '-'}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Tanggal Pencatatan</td>
                                                                                <td>${item.created_at ? moment.utc(item.created_at).format('DD/MM/YYYY') : '-'}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>Terakhir Diubah</td>
                                                                                <td>${item.updated_at ? moment.utc(item.updated_at).format('DD/MM/YYYY') : '-'}
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>ID User</td>
                                                                                <td>${item.id_user ?? '-'}</td>
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
                                            </tr > `;
                            });

                            rows += `< tr >
                                            <td colspan="3"><strong>Total</strong></td>
                                            <td><strong>${total}</strong></td>
                                            <td colspan="3"></td>
                                        </tr > `;
                        } else {
                            rows = `< tr > <td colspan="7" class="text-center">Tidak ada data ditemukan.</td></tr >`;
                        }

                        $('#tabel-produk tbody').html(rows);
                    }
                },
                error: function () {
                    alert('Gagal mengambil data.');
                }
            });
        });
    </script>
@endpush