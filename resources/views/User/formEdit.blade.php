<div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
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
                            <td>ID User</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="id_bahan" id="id_bahan" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="nama_bahan" id="nama_bahan" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="username" id="username" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="stok_produk" id="stok_produk" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>Level User</td>
                            <td>:</td>
                            <td>
                                <select name="satuan" id="satuan" class="form-control" required>
                                    <option value="">-- Pilih Level --</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Gudang">Gudang</option>
                                    <option value="Pemilik">Pemilik</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                <button class="btn btn-secondary" type="submit" value="">Ubah</button>
            </div>
        </div>
    </div>
</div>  