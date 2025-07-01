
<div class="modal fade" id="modalBahanMasuk"tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pencatatan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup" >
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data bisa ditaruh di sini -->
                <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table>
                        <tr>
                            <td>ID Kelola Bahan</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="id_kelola_produk" value="BM-">
                            </td>
                        </tr>
                        <tr>
                            <td>ID Bahan</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="id_produk" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="jumlah" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="keterangan" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>Kadaluarsa</td>
                            <td>:</td>
                            <td>
                                <input type="date" name="kadaluarsa" value="">
                            </td>
                        </tr>
                    </table>
                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                <button class="btn btn-damava" type="submit" value="">Tambah</button>
            </div>
        </div>
    </div>
</div>
