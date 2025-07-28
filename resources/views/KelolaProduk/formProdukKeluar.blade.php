<div class="modal fade" id="modalProdukKeluar" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ url('/produkkeluar/create') }}" method="POST" enctype="multipart/form-data"
            class="modal-content">
            @csrf
            <input type="hidden" name="jenis_pencatatan" value="penggunaan_produk">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Pencatatan Produk Keluar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <div class="modal-body">
                <div class="form-group mb-2">
                    <label>ID Kelola Produk</label>
                    <input type="text" name="id_kelola_pr" class="form-control" value="{{ $kodeOtomatis }}" readonly>
                </div>

                <!-- ID Produk -->
                <div class="form-group mb-2">
                    <label>ID Produk</label>
                    <select name="id_produk" id="id_produk" class="form-control" required>
                        <option value="">-- Pilih Produk --</option>
                        @foreach ($list_produk as $produk)
                            <option value="{{ $produk->id_produk }}" data-nama_produk="{{ $produk->nama_produk }}"
                                data-stok="{{ $produk->stok_produk }}">
                                {{ $produk->id_produk }} - {{ $produk->nama_produk }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Nama Produk Otomatis -->
                <div class="form-group mb-2">
                    <label>Nama Produk</label>
                    <input type="text" id="nama_produk" class="form-control" readonly>
                </div>

                <!-- Stok Saat Ini -->
                <div class="form-group mb-2">
                    <label>Stok Saat Ini</label>
                    <input type="text" id="stok_saat_ini" class="form-control" readonly>
                </div>

                <div class="form-group mb-2">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah_produk" class="form-control" required>
                </div>

                <div class="form-group mb-2">
                    <label>Keterangan</label>
                    <input type="text" name="keterangan" class="form-control">
                </div>

                <input type="hidden" name="id_user" value="ADM-001"> {{-- ganti dengan user login --}}
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-damava">Tambah</button>
            </div>
        </form>
    </div>
</div>

<!-- Script Auto Isi Nama Produk dan Stok -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const idProdukSelect = document.getElementById('id_produk');
        const namaProdukInput = document.getElementById('nama_produk');
        const stokSaatIniInput = document.getElementById('stok_saat_ini');

        idProdukSelect.addEventListener('change', function () {
            const selected = this.options[this.selectedIndex];
            const namaProduk = selected.getAttribute('data-nama_produk');
            const stokProduk = selected.getAttribute('data-stok');

            namaProdukInput.value = namaProduk || '';
            stokSaatIniInput.value = stokProduk || '';
        });
    });
</script>