<div class="modal fade" id="ProdukModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Produk</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data bisa ditaruh di sini -->
                <form action="{{ url('/produk/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table>
                        <tr>
                            <td>ID Produk</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="id_produk" class="form-control" value="{{ $kodeOtomatis }}"
                                    readonly>
                            </td>
                        </tr>


                        <tr>
                            <td>Nama Produk</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="nama_produk" id="nama_produk" class="form-control"required>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="satuan">Satuan</label></td>
                            <td>:</td>
                            <td>
                                <select name="satuan" id="satuan" class="form-control" required>
                                    <option value="" disabled selected hidden>-- Pilih Satuan --</option>
                                    <option value="pcs">Pcs</option>
                                    <option value="pack">Pack</option>
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>Stok Produk</td>
                            <td>:</td>
                            <td>
                                <input type="number" name="stok_produk" class="form-control" value="0" readonly>
                                <small class="text-danger"></small>

                            </td>
                        </tr>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button class="btn btn-damava" type="submit" value="">Tambah</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>