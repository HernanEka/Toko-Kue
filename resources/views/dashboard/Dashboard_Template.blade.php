<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>Dashboard KedaiKhairaku</title>
</head>

<body>

    <div class="d-flex">
        <div class="col-md-2 p-4 bg-primer text-white min-vh-100">
            <div class="text-center mb-5">
                <h1 class="display-1 mb-2"><i class="bi bi-person-circle"></i></h1>
                <h2 class="fs-2 mb-2">Admin</h2>
                <a href="/logout" class="btn btn-outline-light">Logout</a>
            </div>
            <div class="mb-2">
                <a href="/admin" class="text-decoration-none text-white">Data Pesanan</a>
            </div>
            <div class="mb-2">
                <a href="/admin/data-kue" class="text-decoration-none text-white">Data Kue</a>
            </div>
        </div>
        <div class="col p-5">
            @yield('data')
        </div>
    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
