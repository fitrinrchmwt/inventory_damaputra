<div class="modal fade" id="modalBahanKeluar" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="{{ url('/bahankeluar/create') }}" method="POST" enctype="multipart/form-data"
            class="modal-content">
            @csrf
            <input type="hidden" name="jenis_pencatatan" value="penggunaan_bahanbaku">

            <div class="modal-header">
                <h5 class="modal-title">Tambah Pencatatan Bahan Keluar</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>

            <div class="modal-body">
                <div class="form-group mb-2">
                    <label>ID Kelola Bahan</label>
                    <input type="text" name="id_kelola_bb" class="form-control" value="{{ $kodeOtomatis }}" readonly>
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

                <!-- Nama Bahan Otomatis -->
                <div class="form-group mb-2">
                    <label>Nama Bahan</label>
                    <input type="text" id="nama_bahan" class="form-control" readonly>
                </div>

                <!-- Stok Saat Ini -->
                <div class="form-group mb-2">
                    <label>Stok Saat Ini</label>
                    <input type="text" id="stok_saat_ini" class="form-control" readonly>
                </div>

                <div class="form-group mb-2">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah_bahan" class="form-control" required>
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

<!-- Script Auto Isi Nama Bahan dan Stok -->
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