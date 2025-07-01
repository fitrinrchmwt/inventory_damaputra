
<div class="modal fade" id="editProdukModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup" >
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form detail -->
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table>
                        <tr>
                            <td>ID Produk</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="id_produk"  value="">
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Produk</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="nama_produk"  value="">
                            </td>
                        </tr>
                        <tr>
                            <td>Satuan</td>
                            <td>:</td>
                            <td>
                                <select name="satuan" class="form-control" required>
                                    <option value="">-- Pilih Satuan --</option>
                                    <option value="pcs">Pcs</option>
                                    <option value="box">Pack</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Stok Produk</td>
                            <td>:</td>
                            <td>
                                <input type="number" name="stok_produk"  value="0">
                            </td>
                        </tr>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        <button class="btn btn-damava" type="submit" value="">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>  