<div class="modal fade" id="BahanModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Bahan Baku</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup" >
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data bisa ditaruh di sini -->
                <form action="{{ url('bahan/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table>
                        <tr>
                            <td>ID Bahan Baku</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="id_bahan" id="id_bahan" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Bahan Baku</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="nama_bahan" id="nama_bahan" value="">
                            </td>
                        </tr>
                        <tr>
                            <td>Satuan</td>
                            <td>:</td>
                            <td>
                                <select name="satuan" id="satuan" class="form-control" required>
                                    <option value="">-- Pilih Satuan --</option>
                                    <option value="Liter">Liter</option>
                                    <option value="Kg">Kg</option>
                                    <option value="Gram">Gram</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Stok Bahan</td>
                            <td>:</td>
                            <td>
                                <input type="number" name="stok_produk" id="stok_produk" value="0">
                            </td>
                        </tr>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Tutup</button>
                        <button class="btn btn-damava" type="submit" value="">Tambah</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>