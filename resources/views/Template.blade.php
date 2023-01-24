<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kedai Khaira</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primer navbar-dark sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">Kedai Khaira</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/kue">Kue</a>
                    </li>
                </ul>
                <ul class="navbar-nav mb-lg-0">
                    @auth
                        <li class="nav-item">
                            <a href="/keranjang" class="nav-link"><i class="bi bi-cart-fill"></i></a>
                        </li>
                        <li class="nav-item">
                            <a type="a" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"
                                data-bs-display="static" aria-expanded="false">
                                <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-lg-end">
                                <li><a href="/logout" class="dropdown-item">Logout</a></li>
                            </ul>
                        </li>
                    @endauth
                    @guest
                        <li class="nav-item me-2">
                            <!-- Button modal Register -->
                            <button type="button" class="btn btn-outline-light" data-bs-toggle="modal"
                                data-bs-target="#modalRegister">
                                Daftar
                            </button>
                        </li>
                        <li class="nav-item">
                            <!-- Button modal Login -->
                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                data-bs-target="#modalLogin">
                                Login
                            </button>
                        </li>
                    @endguest
                    {{-- <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Profile
                        </a>
                        <ul class="dropdown-menu dropdown-menu-lg-end dropdown-menu-dark">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </div>
        </div>
    </nav>

    <!-- Modal Login -->
    <form action="/login" method="post">
        @csrf
        <div class="modal fade" id="modalLogin" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h1 class="modal-title fs-4 text-primer w-100" id="staticBackdropLabel">Login</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput" class="text-primer">Alamat Email</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword" class="text-primer">Password</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primer w-100">Login</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal Register -->
    <form action="/daftar" method="post">
        @csrf
        <div class="modal fade" id="modalRegister" data-bs-backdrop="static" data-bs-keyboard="false"
            tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header text-center">
                        <h1 class="modal-title fs-4 text-primer w-100" id="staticBackdropLabel">Daftar Akun</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-floating mb-3">
                            <input type="text" name="name" class="form-control" id="floatingInputNama"
                                placeholder="Nama Lengkap">
                            <label for="floatingInputNama" class="text-primer">Nama Lengkap</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" name="no_hp" class="form-control" id="floatingInputNama"
                                placeholder="Nomor Telepon">
                            <label for="floatingInputNama" class="text-primer">Nomor Telepon</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" name="email" class="form-control" id="floatingInput"
                                placeholder="name@example.com">
                            <label for="floatingInput" class="text-primer">Alamat Email</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="password" class="form-control" id="floatingPassword"
                                placeholder="Password">
                            <label for="floatingPassword" class="text-primer">Password</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primer w-100">Daftar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    {{-- Navbar end --}}


    {{-- Konten Disini --}}
    @yield('konten')



    <!-- Footer -->
    <footer class="text-center text-lg-start text-white bg-primer">
        <!-- Grid container -->
        <div class="container p-4 pb-0">
            <!-- Section: Links -->
            <section class="">
                <!--Grid row-->
                <div class="row">
                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class=" navbar-brand mb-4 font-weight-bold">
                            Kedai Khaira
                        </h6>
                        <p>
                            Kedai Khaira menjual berbagai jenis kue yang bisa langsung dikirim ke rumah pelanggan.
                        </p>
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Jenis Kue</h6>
                        <p>
                            <a class="text-white">Kue Basah</a>
                        </p>
                        <p>
                            <a class="text-white">Kue Kering</a>
                        </p>
                        <p>
                            <a class="text-white">Kue Bolu</a>
                        </p>
                        {{-- <p>
                            <a class="text-white">Kue Bolu</a>
                        </p> --}}
                    </div>
                    <!-- Grid column -->

                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">
                            Kategori
                        </h6>
                        <p>
                            <a class="text-white">Best Seller</a>
                        </p>
                        <p>
                            <a class="text-white">Keluaran Terbaru</a>
                        </p>
                        {{-- <p>
                            <a class="text-white">Kue Kostum</a>
                        </p> --}}
                        <p>
                            <a class="text-white">Beli Kue</a>
                        </p>
                    </div>

                    <!-- Grid column -->
                    <hr class="w-100 clearfix d-md-none" />

                    <!-- Grid column -->
                    <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                        <h6 class="text-uppercase mb-4 font-weight-bold">Tentang Kami</h6>
                        <p><i class="bi bi-house mr-3"></i> New York, NY 10012, US</p>
                        <p><i class="bi bi-envelope mr-3"></i> info@gmail.com</p>
                        <p><i class="bi bi-phone mr-3"></i> + 01 234 567 88</p>
                        <p><i class="bi bi-printer mr-3"></i> + 01 234 567 89</p>
                    </div>
                    <!-- Grid column -->
                </div>
                <!--Grid row-->
            </section>
            <!-- Section: Links -->

            <hr class="my-3">

            <!-- Section: Copyright -->
            <section class="p-3 pt-0">
                <div class="row d-flex align-items-center">
                    <!-- Grid column -->
                    <div class="col-md-7 col-lg-8 text-center text-md-start">
                        <!-- Copyright -->
                        <div class="p-3">
                            © 2023 Copyright:
                            <a class="text-white">Kedai Khaira</a>
                        </div>
                        <!-- Copyright -->
                    </div>
                    <!-- Grid column -->

                    <!-- Grid column -->
                    <div class="col-md-5 col-lg-4 ml-lg-0 text-center text-md-end">
                        <!-- Facebook -->
                        <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i
                                class="fab fa-facebook-f"></i></a>

                        <!-- Twitter -->
                        <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i
                                class="fab fa-twitter"></i></a>

                        <!-- Google -->
                        <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i
                                class="fab fa-google"></i></a>

                        <!-- Instagram -->
                        <a class="btn btn-outline-light btn-floating m-1" class="text-white" role="button"><i
                                class="fab fa-instagram"></i></a>
                    </div>
                    <!-- Grid column -->
                </div>
            </section>
            <!-- Section: Copyright -->
        </div>
        <!-- Grid container -->
    </footer>
    <!-- Footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</html>
