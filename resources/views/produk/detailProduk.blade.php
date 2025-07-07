<!-- <div class="modal fade" id="detailProdukModal{{ $produk->id_produk }}" tabindex="-1"
    aria-labelledby="detailProdukLabel{{ $produk->id_produk }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="detailProdukLabel{{ $produk->id_produk }}">Detail Produk</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td>ID Produk</td>
                        <td>{{ $produk->id_produk }}</td>
                    </tr>
                    <tr>
                        <td>Nama Produk</td>
                        <td>{{ $produk->nama_produk }}</td>
                    </tr>
                    <tr>
                        <td>Satuan</td>
                        <td>{{ ucfirst($produk->satuan) }}</td>
                    </tr>
                    <tr>
                        <td>Stok Produk</td>
                        <td>{{ $produk->stok_produk }}</td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td>{{ $produk->created_at ? $produk->created_at->format('d/m/Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td>{{ $produk->updated_at ? $produk->updated_at->format('d/m/Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <td>ID User</td>
                        <td>{{ $produk->id_user ?? '-' }}</td>
                    </tr>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div> -->