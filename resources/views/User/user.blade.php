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
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>ID User</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>ADM-001</td>
                            <td>admin01@gmail.com</td>
                            <td >Admin1</td>
                            <td width="35%"><a href="#" class="d-none d-sm-inline-block btn btn-info shadow-sm" data-bs-toggle="modal" data-bs-target="#detailUserModal">
                            <i class="fas fa-file-alt fa-sm text-white-50"></i> Detail</a> | <a href="#" class="d-none d-sm-inline-block btn btn-warning shadow-sm" data-bs-toggle="modal" data-bs-target="#editUserModal">
                            <i class="fas fa-edit fa-sm text-white-50"></i> Edit</a> | 
                            <a href="javascript:void(0);" onclick="hapusData('123')" class="d-none d-sm-inline-block btn btn-danger shadow-sm">
                            <i class="fas fa-trash-alt fa-sm text-white-50"></i> Hapus
                            </a></td>
                            
                        </tr>     
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