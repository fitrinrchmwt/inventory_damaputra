<!-- <div class="modal fade" id="detailBahanModal{{ $bahan->id_bahan }}" tabindex="-1"
    aria-labelledby="detailBahanLabel{{ $bahan->id_bahan }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="detailBahanLabel{{ $bahan->id_bahan }}">Detail Bahan</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup">
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>

            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <td>ID Bahan</td>
                        <td>{{ $bahan->id_bahan }}</td>
                    </tr>
                    <tr>
                        <td>Nama Bahan</td>
                        <td>{{ $bahan->nama_bahan }}</td>
                    </tr>
                    <tr>
                        <td>Satuan</td>
                        <td>{{ ucfirst($bahan->satuan) }}</td>
                    </tr>
                    <tr>
                        <td>Stok Bahan</td>
                        <td>{{ $bahan->stok_bahan }}</td>
                    </tr>
                    <tr>
                        <td>Created At</td>
                        <td>{{ $bahan->created_at ? $bahan->created_at->format('d/m/Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <td>Updated At</td>
                        <td>{{ $bahan->updated_at ? $bahan->updated_at->format('d/m/Y') : '-' }}</td>
                    </tr>
                    <tr>
                        <td>ID User</td>
                        <td>{{ $bahan->id_user ?? '-' }}</td>
                    </tr>
                    <tr>
                        <td>Kadaluarsa</td>
                        <td>{{ $bahan->kadaluarsa ? \Carbon\Carbon::parse($bahan->kadaluarsa)->format('d/m/Y') : '-' }}
                        </td>
                    </tr>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>

        </div>
    </div>
</div> -->