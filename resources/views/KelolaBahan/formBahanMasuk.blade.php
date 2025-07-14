<div class="modal fade" id="modalBahanMasuk" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ url('/bahanmasuk/create') }}" method="POST">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Pencatatan Bahan Masuk</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>

                <div class="modal-body">
                    <!-- ID Kelola Bahan (otomatis) -->
                    <div class="form-group mb-2">
                        <label>ID Kelola Bahan</label>
                        <input type="text" name="id_kelola_bb" class="form-control" value="{{ $kodeOtomatis }}"
                            readonly>
                    </div>

                    <!-- ID Bahan -->
                    <div class="form-group mb-2">
                        <label>ID Bahan</label>
                        <select name="id_bahan" id="id_bahan" class="form-control" required>
                            <option value="">-- Pilih Bahan --</option>
                            @foreach ($list_bahan as $bahan)
                                <option value="{{ $bahan->id_bahan }}" data-nama_bahan="{{ $bahan->nama_bahan }}"
                                    data-stok="{{ $bahan->stok_bahan }}">
                                    {{ $bahan->id_bahan }} - {{ $bahan->nama_bahan }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Nama Bahan (otomatis) -->
                    <div class="form-group mb-2">
                        <label>Nama Bahan</label>
                        <input type="text" id="nama_bahan" class="form-control" readonly>
                    </div>

                    <!-- Stok Saat Ini (otomatis) -->
                    <div class="form-group mb-2">
                        <label>Stok Saat Ini</label>
                        <input type="text" id="stok_saat_ini" class="form-control" readonly>
                    </div>

                    <!-- Jumlah Bahan Masuk -->
                    <div class="form-group mb-2">
                        <label>Jumlah</label>
                        <input type="number" name="jumlah_bahan" class="form-control" required>
                    </div>

                    <!-- Keterangan -->
                    <div class="form-group mb-2">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control">
                    </div>

                    <!-- Kadaluarsa -->
                    <div class="form-group mb-2">
                        <label>Kadaluarsa</label>
                        <input type="date" name="kedaluwarsa_bahan_kelola" class="form-control">
                    </div>

                    <!-- Hidden -->
                    <input type="hidden" name="jenis_pencatatan" value="pemasukan_bahan">
                    <input type="hidden" name="id_user" value="ADM-001"> <!-- Ganti dengan user login -->
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-damava">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Auto isi nama bahan dan stok -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const idBahanSelect = document.getElementById('id_bahan');
        const namaBahanInput = document.getElementById('nama_bahan');
        const stokSaatIniInput = document.getElementById('stok_saat_ini');

        idBahanSelect.addEventListener('change', function () {
            const selected = this.options[this.selectedIndex];
            const namaBahan = selected.getAttribute('data-nama_bahan');
            const stokBahan = selected.getAttribute('data-stok');

            namaBahanInput.value = namaBahan || '';
            stokSaatIniInput.value = stokBahan || '';
        });
    });
</script>