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


                <!-- Include modal dari file terpisah -->
                @include('bahan.form')
                <!-- Tambah Pencatatan -->
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-damava shadow-sm"
                            style="padding: 10px; margin-bottom: 10px;" data-bs-toggle="modal" data-bs-target="#BahanModal">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
                        </a>
                    </div>
                </div>
                <!-- Modal -->


                <!-- End Modal -->
                <!--FCF2F6-->
                <!--F4E8ED-->

                <form id="formFilterBahan" class="row mb-3 formFilterBahan">
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="filter_nama_bahan" placeholder="Masukkan Nama Bahan">
                    </div>
                    <div class="col-md-2">
                        <select id="filter_satuan" name="satuan" class="form-control">
                                    <option value="">-- Pilih Satuan --</option>
                                    <option value="Liter">Liter</option>
                                    <option value="Kg">Kg</option>
                                    <option value="Gram">Gram</option>
                                </select>

                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" id="filter_stok_min" placeholder="Stok Minimum" min="0">
                    </div>
                    <div class="col-md-2">
                        <input type="number" class="form-control" id="filter_stok_max" placeholder="Stok Maksimum" min="0">
                    </div>
                    <div class="col-md-2 btnFilter" id="btnFilter">
                        <button type="button" class="btn btn-damava" >
                            <i class="fas fa-search"></i> Cari
                        </button>
                    </div>
                </form>


                <!-- Table -->
                <div class="scroll-table-container">
                    <table class="table table-bordered table-striped text-center" id="dataTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>ID Bahan</th>
                                <th>Nama Bahan</th>
                                <th>Satuan</th>
                                <th>Stok</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @forelse ($dataBahan as $key => $bahan)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $bahan->id_bahan }}</td>
                                    <td>{{ $bahan->nama_bahan }}</td>
                                    <td>{{ $bahan->satuan }}</td>
                                    <td width="12%">{{ $bahan->stok_bahan }}</td>
                                    <td width="28%">
                                        <!-- Tombol Detail -->
                                        <a href="#" class="btn btn-info btn-sm shadow-sm" data-bs-toggle="modal"
                                            data-bs-target="#detailBahanModal{{ $bahan->id_bahan }}">
                                            <i class=" fas fa-file-alt fa-sm text-white-50"></i>Detail</a> |



                                        <!-- Tombol Edit -->
                                        <a href="#" class="btn btn-warning btn-sm shadow-sm edit-product-btn"
                                            data-bs-toggle="modal" data-bs-target="#editBahanModal"
                                            data-id_bahan="{{ $bahan->id_bahan }}" data-nama_bahan="{{ $bahan->nama_bahan }}"
                                            data-satuan="{{ $bahan->satuan }}" data-stok_bahan="{{ $bahan->stok_bahan }}">
                                            <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a>
                                        |

                                        <!-- Tombol Hapus -->
                                       <button class="btn btn-danger btn-sm shadow-sm delete-product-btn" data-id="{{ $bahan->id_bahan }}">
                                    <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus
                                </button>

                                        <!-- Modal Detail -->
                                        <div class="modal fade" id="detailBahanModal{{ $bahan->id_bahan }}" tabindex="-1"
                                            aria-labelledby="modalLabel{{ $bahan->id_bahan }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalLabel{{ $bahan->id_bahan }}">Detail
                                                            Bahan</h5>
                                                        <button type="button" class="close" data-bs-dismiss="modal"
                                                            aria-label="Batal">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <table class="table table-bordered">
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
                                                                <td>Stok Bahan</td>
                                                                <td>{{ $bahan->stok_bahan }}</td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal Input Data</td>
                                                                <td>{{ $bahan->created_at ? $bahan->created_at->format('d/m/Y') : '-' }}
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td>Tanggal Edit</td>
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

                            @empty
                                <tr>
                                    <td colspan="6">Data Tidak Ada</td>
                                </tr>
                            @endforelse
                            @if ($dataBahan->count() > 0)

                                <tr>
                                    <td colspan="4"><strong>Total</strong></td>
                                    <td><strong>{{ $dataBahan->sum('stok_bahan') }}</strong></td>
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



                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const buttons = document.querySelectorAll('.edit-product-btn');

                            buttons.forEach(button => {
                                button.addEventListener('click', function () {
                                    document.getElementById('edit_id_bahan').value = this.dataset.id_bahan;
                                    document.getElementById('edit_nama_bahan').value = this.dataset.nama_bahan;
                                    document.getElementById('edit_satuan').value = this.dataset.satuan;
                                    document.getElementById('edit_stok_bahan').value = this.dataset.stok_bahan;
                                });
                            });
                        });
                    </script>
                    <!-- Modal Detail Start -->
                    <!-- @include('bahan.detailBahan') -->

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

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/moment@2.29.4/moment.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
   $('#btnFilter button').click(function () {
    var nama_bahan = $('#filter_nama_bahan').val();
    var satuan = $('#filter_satuan').val();
    var stok_min = $('#filter_stok_min').val();
    var stok_max = $('#filter_stok_max').val();
    var tanggal = $('#filter_tanggal').val();
    var updated_at = $('#filter_updated_at').val();

    $.ajax({
        url: '{{ url("/bahan/filter") }}',
        type: 'GET',
        data: {
            nama_bahan: nama_bahan,
            satuan: satuan,
            stok_min: stok_min,
            stok_max: stok_max,
            tanggal: tanggal,
            updated_at: updated_at
        },
        success: function (response) {
            let rows = '';
            let total = 0;
            let no = 1;

            if (response.status === 'success') {
                if (response.data.length > 0) {
                    $.each(response.data, function (index, item) {
                        total += parseInt(item.stok_bahan);

                        rows += `<tr>
                            <td>${no++}</td>
                            <td>${item.id_bahan}</td>
                            <td>${item.nama_bahan ?? '-'}</td>
                            <td>${item.satuan}</td>
                            <td>${item.stok_bahan ?? '-'}</td>
                            <td width="28%">
                                <a href="#" class="btn btn-info btn-sm shadow-sm" data-bs-toggle="modal"
                                                    data-bs-target="#detailBahanBakuModal${item.id_bahan}">
                                                    <i class="fas fa-file-alt fa-sm text-white-50"></i> Detail
                                                </a>
                                |
                                <button class="btn btn-warning btn-sm shadow-sm edit-product-btn"
                                    data-id_bahan="${item.id_bahan}"
                                    data-nama_bahan="${item.nama_bahan}" 
                                    data-satuan="${item.satuan}"
                                    data-stok_bahan="${item.stok_bahan}">
                                    <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                                </button> |
                                <button class="btn btn-danger btn-sm shadow-sm delete-product-btn" data-id="${item.id_bahan}">
                                    <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus
                                </button>

                                <!-- Modal Detail -->
                                                <div class="modal fade" id="detailBahanBakuModal${ item.id_bahan }"
                                                    tabindex="-1" aria-labelledby="modalLabel${ item.id_bahan }"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="modalLabel${ item.id_bahan }">Detail
                                                                    Produk</h5>
                                                                <button type="button" class="close" data-bs-dismiss="modal"
                                                                    aria-label="Tutup">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <table class="table table-bordered">
                                                                    <tr>
                                                                        <td>ID Bahan</td>
                                                                        <td>${ item.id_bahan }</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Nama Bahan</td>
                                                                        <td>${ item.nama_bahan }</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Satuan</td>
                                                                        <td>${ item.satuan }</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Jumlah</td>
                                                                        <td>${ item.stok_bahan }</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>Tanggal Pencatatan</td>
                                                                        <td>${ item.created_at ? moment.utc(item.created_at).format('DD/MM/YYYY') : '-' }
                                                                        </td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td>Terakhir Diubah</td>
                                                                        <td>${ item.updated_at ? moment.utc(item.updated_at).format('DD/MM/YYYY') : '-' }
                                                                        </td>
                                                                    
                                                                    <tr>
                                                                        <td>ID User</td>
                                                                        <td>${ item.id_user ?? '-' }</td>
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
                        </tr>`;
                    });

                    rows += `<tr>
                        <td colspan="4"><strong>Total</strong></td>
                        <td><strong>${total}</strong></td>
                        <td></td>
                    </tr>`;
                } else {
                    rows = `<tr><td colspan="6" class="text-center">Tidak ada data ditemukan.</td></tr>`;
                }

                $('#dataTable tbody').html(rows);
            }
        },
        error: function () {
            alert('Gagal mengambil data.');
        }
    });
});
</script>

<script>
    // Edit
$(document).on('click', '.edit-product-btn', function() {
    $('#edit_id_bahan').val($(this).data('id_bahan'));
    $('#edit_nama_bahan').val($(this).data('nama_bahan'));
    $('#edit_satuan').val($(this).data('satuan'));
    $('#edit_stok_bahan').val($(this).data('stok_bahan'));
    $('#editProdukModal').modal('show');
});

// Detail
$(document).on('click', '.detail-product-btn', function() {
    var id = $(this).data('id');
    // AJAX untuk ambil detail bahan, lalu tampilkan di modal
    // Atau tampilkan modal yang sudah ada jika data sudah tersedia
});

// Hapus
$(document).on('click', '.delete-product-btn', function() {
    var id = $(this).data('id');
    var csrf = $('meta[name="csrf-token"]').attr('content');
    var baseUrl = "{{ url('hapusbahan') }}";
    var url = `${baseUrl}/${id}`;
    if (confirm('Yakin ingin menghapus bahan ini?')) {
        $.ajax({
            url: url,
            type: 'POST',
            data: {
                _token: csrf,
                _method: 'DELETE'
            },
            success: function(res) {
                // Refresh tabel setelah hapus
                $('#btnFilter button').click();
                // Tampilkan notifikasi sukses dengan SweetAlert
                Swal.fire({
                    title: 'Sukses!',
                    text: 'Bahan Baku berhasil dihapus.',
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            },
            error: function() {
                alert('Bahan Baku gagal dihapus.');
            }
        });
    }
});
</script>
@endpush