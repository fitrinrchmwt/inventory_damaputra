<div class="modal fade" id="editProdukModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Produk</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('produk/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table class="table">
                        <tr>
                            <td>ID Produk</td>
                            <td><input type="text" id="edit_id_produk" name="id_produk" class="form-control" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Produk</td>
                            <td><input type="text" id="edit_nama_produk" name="nama_produk" class="form-control" required></td>
                        </tr>
                        <tr>
                            <td>Satuan</td>
                            <td>
                                <select id="edit_satuan" name="satuan" class="form-control" required>
                                    <option value="">-- Pilih Satuan --</option>
                                    <option value="pcs">Pcs</option>
                                    <option value="pack">Pack</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Stok Produk</td>
                            <td><input type="number" id="edit_stok_produk" name="stok_produk" class="form-control" readonly required></td>
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