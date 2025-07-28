<div class="modal fade" id="editBahanModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Bahan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('bahan/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table">
                        <tr>
                            <td>ID Bahan</td>
                            <td><input type="text" id="edit_id_bahan" name="id_bahan" class="form-control" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Bahan</td>
                            <td><input type="text" id="edit_nama_bahan" name="nama_bahan" class="form-control"
                                    required></td>
                        </tr>
                        <tr>
                            <td>Satuan</td>
                            <td>
                                <select id="edit_satuan" name="satuan" class="form-control" required>
                                    <option value="">-- Pilih Satuan --</option>
                                    <option value="Liter">Liter</option>
                                    <option value="Kg">Kg</option>
                                    <option value="Gram">Gram</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Stok Bahan</td>
                            <td><input type="number" id="edit_stok_bahan" name="stok_bahan" class="form-control" readonly required></td>
                        </tr>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-damava" type="submit">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>