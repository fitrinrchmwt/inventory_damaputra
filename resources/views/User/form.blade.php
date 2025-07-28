<div class="modal fade" id="UserModal" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data User</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Tutup" >
                    <span aria-hidden="true"><i class="fas fa-times"></i></span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data bisa ditaruh di sini -->
                <form action="{{ url('register') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <table>
                        <tr>
                            <td>ID User</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="id_user" id="id_user" class="form-control" required >
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>
                                <input type="email" name="email" id="email" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="username" id="username" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td>:</td>
                            <td>
                                <input type="password" name="password" id="password" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Level User</td>
                            <td>:</td>
                            <td>
                                <select name="level_user" id="level_user" class="form-control" required>
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
                        <button class="btn btn-damava" type="submit" >Tambah</button>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>