<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->

    <link rel="stylesheet" href="{{ asset('asset/fontawesome-free/css/all.min.css') }}" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('asset/css/sb-admin-2.min.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('asset/datatables/dataTables.bootstrap4.min.css') }}" type="text/css">
    <style>
        .btn-damava {
            background-color: #8e3f6d; /* atau sesuaikan dari warna sidebar */
            color: white;
            border: none;
        }

        .btn-damava:hover {
            background-color: #a14d7e;
        }

        .sidebar .nav-item .collapse .collapse-inner .collapse-item.active,.sidebar .nav-item .collapsing .collapse-inner .collapse-item.active {
            color: #8e3f6d;
            font-weight: 700
        }

        .page-item.active .page-link {
            z-index: 3;
            color: #fff;
            background-color: #8e3f6d;
            border-color: #8e3f6d;
        }
    </style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ url('') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="sidebar-brand-text mx-3">INVENTORY DAMAVA</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link" href="{{ url('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Kelola
            </div>

            <!-- Kelola Data -->
            <li class="nav-item {{ Request::is('produk') || Request::is('bahanbaku') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKelolaData"
                    aria-expanded="{{ Request::is('produk') || Request::is('bahanbaku') ? 'true' : 'false' }}">
                    <i class="fas fa-database"></i>
                    <span>Kelola Data</span>
                </a>
                <div id="collapseKelolaData" class="collapse {{ Request::is('produk') || Request::is('bahanbaku') ? 'show' : '' }}">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Request::is('produk') ? 'active' : '' }}" href="{{ url('produk') }}">Produk</a>
                        <a class="collapse-item {{ Request::is('bahanbaku') ? 'active' : '' }}" href="{{ url('bahanbaku') }}">Bahan Baku</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- Kelola Pencatatan -->
            <li class="nav-item {{ Request::is('primary') || Request::is('kelolaprodukkeluar') || Request::is('kelolabahanmasuk') || Request::is('kelolabahankeluar') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePencatatan"
                    aria-expanded="{{ Request::is('kelolaprodukmasuk') || Request::is('kelolaprodukkeluar') || Request::is('kelolabahanmasuk') || Request::is('kelolabahankeluar') ? 'true' : 'false' }}">
                    <i class="fas fa-folder-open"></i>
                    <span>Kelola Pencatatan</span>
                </a>
                <div id="collapsePencatatan" class="collapse {{ Request::is('kelolaprodukmasuk') || Request::is('kelolaprodukkeluar') || Request::is('kelolabahanmasuk') || Request::is('kelolabahankeluar') ? 'show' : '' }}">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Request::is('kelolaprodukmasuk') ? 'active' : '' }}" href="{{ url('kelolaprodukmasuk') }}">Produk Masuk</a>
                        <a class="collapse-item {{ Request::is('kelolaprodukkeluar') ? 'active' : '' }}" href="{{ url('kelolaprodukkeluar') }}">Produk Keluar</a>
                        <a class="collapse-item {{ Request::is('kelolabahanmasuk') ? 'active' : '' }}" href="{{ url('kelolabahanmasuk') }}">Bahan Masuk</a>
                        <a class="collapse-item {{ Request::is('kelolabahankeluar') ? 'active' : '' }}" href="{{ url('kelolabahankeluar') }}">Bahan Keluar</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan & User
            </div>

            <!-- Laporan -->
            <li class="nav-item {{ Request::is('laporanproduk') || Request::is('laporanbahan') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLaporan"
                    aria-expanded="{{ Request::is('laporanproduk') || Request::is('laporanbahan') ? 'true' : 'false' }}">
                    <i class="fas fa-fw fa-chart-line"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseLaporan" class="collapse {{ Request::is('laporanproduk') || Request::is('laporanbahan') ? 'show' : '' }}">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Request::is('laporanproduk') ? 'active' : '' }}" href="{{ url('laporanproduk') }}">Laporan Produk</a>
                        <a class="collapse-item {{ Request::is('laporanbahan') ? 'active' : '' }}" href="{{ url('laporanbahan') }}">Laporan Bahan</a>
                    </div>
                </div>
            </li>

            <!-- User -->
            <li class="nav-item {{ Request::is('user') || Request::is('riwayat-login') ? 'active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser"
                    aria-expanded="{{ Request::is('user') || Request::is('riwayat-login') ? 'true' : 'false' }}">
                    <i class="fas fa-users"></i>
                    <span>Kelola User</span>
                </a>
                <div id="collapseUser" class="collapse {{ Request::is('user') || Request::is('riwayat-login') ? 'show' : '' }}">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item {{ Request::is('user') ? 'active' : '' }}" href="{{ url('user') }}">User</a>
                        <a class="collapse-item {{ Request::is('riwayat-login') ? 'active' : '' }}" href="{{ url('riwayat-login') }}">Riwayat</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <div class="sidebar-brand-text mx-3" style="font-weight: bold;">PT DAMA PUTRA SEJAHTERA <sup></sup></div>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-2x fa-user-circle"></i>
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Session::get('username') }}</span>
                                <i class="fas fa-angle-down"></i>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{ url('profile') }}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <div class="dropdown-divider"></div>
                                <a href="{{ route('logout') }}" 
                                class="dropdown-item"
                                onclick="return confirm('Yakin ingin logout?')">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                @yield('content')

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Inventory Damava 2025</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-damava" type="button" data-dismiss="modal">Batal</button>
                    <a class="btn btn-primary" href="{{ url('') }}">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
     
    <script src="{{ asset('asset/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('asset/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('asset/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('asset/js/sb-admin-2.min.js') }}"></script>


    <!-- Page level plugins -->
    <script src="{{ asset('asset/chart.js/Chart.min.js') }}"></script>
    <!-- Page level plugins --><!-- buat lihat brp halaman & blm tak edit gk tau bisa gk -->
    <script src="{{ asset('asset/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('asset/datatables/dataTables.bootstrap4.min.js') }}"></script>
    
    


    <!-- Page level custom scripts -->
    
    <script src="{{ asset('asset/js/demo/chart-pie-demo.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    @yield('script')

    
</body>

</html>
