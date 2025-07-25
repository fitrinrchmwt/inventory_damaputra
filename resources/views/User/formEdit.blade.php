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
                <form action="{{ ('user/update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <input type="hidden" name="id_user" id="edit-id_user">

                    <table class="table table-borderless">
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="email" class="form-control" name="email" id="edit-email" required></td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td><input type="text" class="form-control" name="username" id="edit-username" required></td>
                        </tr>
                        <tr>
                            <td>Level User</td>
                            <td>:</td>
                            <td>
                                <select name="level_user" id="edit-level_user" class="form-control" required>
                                <option value="">-- Pilih Level --</option>
                                <option value="Admin">Admin</option>
                                <option value="Gudang">Gudang</option>
                                <option value="Pemilik">Pemilik</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-damava">Ubah</button>
                    </div>
                        
            
                </form>
            </div>
            
        </div>
    </div>
</div>  