@extends('template.form')

@section('title', 'Laporan Produk')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Laporan Produk</h1>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold" style="color: #5b2a3d;">Data Pencatatan</h6>
            </div>

            <div class="card-body">
                <div class="table-responsive">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <a href="{{ url('/laporan-produk/excel') }}" class="btn btn-sm btn-success"
                                id="btnDownloadExcel">Download Excel</a>
                            <a href="{{ url('/laporan-produk/pdf') }}" class="btn btn-sm btn-danger"
                                id="btnDownloadPDF">Download PDF</a>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-2">
                            <select id="jenis_pencatatan" class="form-control">
                                <option value="semua">-- Jenis Pencatatan --</option>
                                @foreach($produk_jenispencatatan as $jp)
                                    <option value="{{ $jp }}">{{ ucwords(str_replace('_', ' ', $jp)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <select id="id_produk" class="form-control">
                                <option value="semua">-- ID Produk --</option>
                                @foreach($listproduk as $produk)
                                    <option value="{{ $produk->id_produk }}" data-nama_produk="{{$produk->nama_produk}}">
                                        {{ $produk->id_produk }}-{{$produk->nama_produk}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="date" id="tanggal_awal" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <input type="date" id="tanggal_akhir" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <button id="btnFilter" class="btn btn-damava">Filter</button>
                        </div>
                    </div>

                    <table class="table table-bordered table-striped text-center" id="tableLaporan" width="100%"
                        cellspacing="0">

                        <thead style="background-color: #99627A; color: white;">
                            <tr>
                                <th>No.</th>
                                <th>Id Kelola Produk</th>
                                <th>Tanggal</th>
                                <th>Nama Produk</th>
                                <th>Jumlah</th>
                                <th>Jenis Pencatatan</th>
                            </tr>
                        </thead>
                        <tbody id="laporan_produk_body">
                            @foreach($data_laporan as $no => $mengelola_produk)
                                <tr>
                                    <td>{{$no + 1}}</td>
                                    <td>{{$mengelola_produk->id_kelola_pr}}</td>
                                    <td>{{$mengelola_produk->tanggal}}</td>
                                    <td>{{$mengelola_produk->nama_produk}}</td>
                                    <td>{{$mengelola_produk->jumlah}}</td>
                                    <td>{{$mengelola_produk->jenis_pencatatan}}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4"><strong>Total</strong></td>
                                <td>{{$totalJumlah}}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->


@endsection

@push('scripts')
    <script>
        function loadLaporanProduk() {
            let jenis_pencatatan = $('#jenis_pencatatan').val();
            let id_produk = $('#id_produk').val();
            let tanggal_awal = $('#tanggal_awal').val();
            let tanggal_akhir = $('#tanggal_akhir').val();

            $.ajax({
                url: "{{ url('/rekap-produk') }}",
                method: "GET",
                data: {
                    jenis_pencatatan,
                    id_produk,
                    tanggal_awal,
                    tanggal_akhir
                },
                success: function (res) {
                    let html = '';
                    let total = 0;

                    if (res.data.length === 0) {
                        html = `<tr><td colspan="6" class="text-center">Tidak ada data</td></tr>`;
                    } else {
                        $.each(res.data, function (i, item) {
                            html += `
                                <tr>
                                    <td>${i + 1}</td>
                                    <td>${item.id_kelola_pr}</td>
                                    <td>${item.tanggal}</td>
                                    <td>${item.nama_produk}</td>
                                    <td>${item.jumlah}</td>
                                    <td>${item.jenis_pencatatan}</td>
                                </tr>
                            `;
                            total += parseInt(item.jumlah);
                        });

                        html += `
                            <tr>
                                <td colspan="4"><strong>Total</strong></td>
                                <td>${total}</td>
                                <td></td>
                            </tr>
                        `;
                    }

                    $('#tableLaporan tbody').html(html);
                },
                error: function () {
                    alert('Gagal memuat data!');
                }
            });
        }

        $(document).ready(function () {


            $('#btnFilter').on('click', function () {
                loadLaporanProduk();
            });
        });
    </script>
@endpush

@push('scripts')
    <script>
        function updateDownloadLinks() {
            const jenis_pencatatan = $('#jenis_pencatatan').val();
            const id_produk = $('#id_produk').val();
            const tanggal_awal = $('#tanggal_awal').val();
            const tanggal_akhir = $('#tanggal_akhir').val();

            const params = new URLSearchParams({
                jenis_pencatatan,
                id_produk,
                tanggal_awal,
                tanggal_akhir
            }).toString();

            $('#btnDownloadExcel').attr('href', "{{ url('/laporan-produk/excel') }}" + '?' + params);
            $('#btnDownloadPDF').attr('href', "{{ url('/laporan-produk/pdf') }}" + '?' + params);
        }

        $(document).ready(function () {
            // Update link saat halaman loat
            updateDownloadLinks();

            // Update link saat tombol klik filter 
            $('#btnFilter').on('click', function () {
                updateDownloadLinks();
            });

            $('#jenis_pencatatan, #id_produk, #tanggal_awal, #tanggal_akhir').on('change', function () {
                updateDownloadLinks();
            });
        });
    </script>
@endpush