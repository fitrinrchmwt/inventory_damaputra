@extends('template.form')

@section('title', 'Kelola Data User')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola Data User</h1>
                    

    <!-- Main Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #5b2a3d;">Data User</h6>
        </div>      
                        
        
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <!-- Data Table -->
            <div class="table-responsive">
                <!-- Tambah Pencatatan -->
                <div class="row">
                    <div class="col-sm-12 col-md-6">
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-damava shadow-sm" style="padding: 10px; margin-bottom: 10px;" data-bs-toggle="modal" data-bs-target="#UserModal">
                            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data
                        </a>
                    </div>
                </div>
                <!-- Modal -->   
                <!-- Include modal dari file terpisah -->
                @include('User.form')

                <!-- End Modal -->
                

                
                <!-- Table -->
                <table class="table table-bordered table-striped text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: #99627A; color: white;">
                        <tr>
                            <th>No.</th>
                            <th>ID User</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach($users as $no => $user)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $user->id_user }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->username }}</td>
                            <td width="35%">
                                <a href="#"
                                class="btn btn-info btn-sm shadow-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#detailUserModal"
                                data-id="{{ $user->id_user }}"
                                data-email="{{ $user->email }}"
                                data-username="{{ $user->username }}"
                                data-level="{{ $user->level_user }}"
                                data-created="{{ $user->created_at }}"
                                data-updated="{{ $user->updated_at }}">
                                <i class="fas fa-file-alt fa-sm text-white-50"></i> Detail
                                </a>
                                    |
                                <a href="#" class="btn btn-warning btn-sm shadow-sm edit-product-btn"
                                data-bs-toggle="modal" data-bs-target="#editUserModal"
                                data-id="{{ $user->id_user }}"
                                data-email="{{ $user->email }}"
                                data-username="{{ $user->username }}"
                                data-level="{{ $user->level_user }}">
                                <i class="fas fa-edit fa-sm text-white-50"></i> Edit
                                </a> |
                                <form action="{{ url ('user/delete/' . $user->id_user) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus user ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm shadow-sm edit-product-btn">
                                        <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach     
                    </tbody>
                </table>
                <!-- Modal Detail Start -->
                 @include('User.detailUser')
                
                <!-- Modal Detail End -->  

                 <!-- Modal edit Start -->
                @include('User.formEdit')
                <!-- Modal End -->                              
            </div>
            
        </div>
    </div>

</div>
<!-- /.container-fluid -->




@endsection
@section('script')

<script>
    const detailModal = document.getElementById('detailUserModal');
    detailModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        document.getElementById('user-modal-id_user').textContent = button.getAttribute('data-id');
        document.getElementById('user-modal-email').textContent = button.getAttribute('data-email');
        document.getElementById('user-modal-username').textContent = button.getAttribute('data-username');
        document.getElementById('user-modal-level').textContent = button.getAttribute('data-level');
        document.getElementById('user-modal-created').textContent = button.getAttribute('data-created');
        document.getElementById('user-modal-updated').textContent = button.getAttribute('data-updated');
    });
</script>

<script>
    const editModal = document.getElementById('editUserModal');
    editModal.addEventListener('show.bs.modal', function (event) {
        const button = event.relatedTarget;

        document.getElementById('edit-id_user').value = button.getAttribute('data-id');
        document.getElementById('edit-email').value = button.getAttribute('data-email');
        document.getElementById('edit-username').value = button.getAttribute('data-username');
        document.getElementById('edit-level_user').value = button.getAttribute('data-level');
    });
</script>
@endsection
