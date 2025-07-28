<div class="modal fade" id="detailUserModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup" >
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form detail -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <table class="table table-bordered" id="" width="100%" cellspacing="0">
                        <tr><td>ID User</td><td>:</td><td id="user-modal-id_user">{{ $user->id_user }}</td></tr>
                        <tr><td>Email</td><td>:</td><td id="user-modal-email">{{ $user->email }}</td></tr>
                        <tr><td>Username</td><td>:</td><td id="user-modal-username">{{ $user->username }}</td></tr>
                        <tr><td>Level</td><td>:</td><td id="user-modal-level">{{ $user->level_user }}</td></tr>
                        <tr><td>Dibuat</td><td>:</td><td id="user-modal-created">{{ $user->created_at }}</td></tr>
                        <tr><td>Diedit</td><td>:</td><td id="user-modal-updated">{{ $user->updated_at }}</td></tr>
                    </table>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>  