@extends('template.form')

@section('title', 'Riwayat Login')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kelola Riwayat Login</h1>             

    <!-- Main Content -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold" style="color: #5b2a3d;">Riwayat Login</h6>
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
                
                <!-- Table -->
                <table class="table table-striped table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color: #99627A; color: white;">
                        <tr>
                            <th>No.</th>
                            <th>ID User</th>
                            <th>Username</th>
                            <th>Waktu Login</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($riwayat as $no => $login)
                        <tr>
                            <td>{{ $no + 1 }}</td>
                            <td>{{ $login->id_user }}</td>
                            <td>{{ $login->username }}</td>
                            <td>{{ $login->tanggal_login }}</td>
                        </tr>
                        @endforeach     
                    </tbody>
                </table>                
            </div>
            
        </div>
    </div>

</div>
<!-- /.container-fluid -->




@endsection

