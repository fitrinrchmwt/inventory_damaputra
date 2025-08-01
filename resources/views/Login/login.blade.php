<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="{{ asset('asset/fontawesome-free/css/all.min.css') }}" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link rel="stylesheet" href="{{ asset('asset/css/sb-admin-2.min.css') }}" type="text/css">
    <style>
        .btn-damava {
            background-color: #8e3f6d;
            /* atau sesuaikan dari warna sidebar kamu */
            color: white;
            border: none;
        }

        .btn-damava:hover {
            background-color: #a14d7e;
        }
    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image">
                                <img src="{{ asset('asset/foto/foto4.jpg') }}" alt="Background login" width="500">
                                <p class="text-center text-muted mt-3 fst-italic"
                                    style="margin-left:35px; margin-bottom:40px; color:#5b2a3d; font-weight: bold;">
                                    "Kamu bukan yang mengemudi kapal, tapi arah takkan jelas tanpamu. Tetap jadi kompas
                                    yang tenang di tengah sibuknya arus kerja."
                                </p>

                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                                    </div>
                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif
                                    <form action="{{ url('login') }}" method="POST" class="user">
                                        @csrf
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user" name="email"
                                                id="email" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                name="password" id="password" placeholder="Password" required>
                                        </div>
                                        <!-- <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Remember
                                                    Me</label>
                                            </div>
                                        </div> -->
                                        <button type="submit" class="btn btn-damava btn-user btn-block">
                                            Login
                                        </button>
                                        <!-- <hr>
                                        <a href="{{ url('dashboard') }}" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a> -->

                                        <p class=" text-muted mt-3 fst-italic"
                                            style=" color:#5b2a3d; font-weight: bold;">
                                            Note :
                                        </p>
                                        <p class=" text-muted fst-italic"
                                            style="margin-bottom:40px; color:#5b2a3d; font-weight: bold;">
                                            Untuk Percobaan Pengujiannya menggunakan Email: admin01@gmail.com <br>
                                            Sandi: 123456
                                        </p>
                                    </form>
                                    <!-- <hr>
                                    <div class="text-center">
                                        <a class="small" href="{{ url('lupapassword') }}">Lupa Password?</a>
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script src="{{ asset('js/sb-admin-2.min.js') }}"></script>

</body>

</html>