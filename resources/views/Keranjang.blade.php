@extends('Template')

@section('konten')
    <div class="container my-5">
        <div class="text-center mb-5">
            <h1 class="fs-1">Keranjang</h1>
        </div>

        @for ($i = 0; $i < 5; $i++)
                <div class="card mb-2">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="foto-testimoni">
                                    <img src="{{ asset('img/foto-kue/Pumpkin Spice Biscoff Cake.jpg') }}"
                                        class="card-img-top foto-testi mb-2" alt="...">
                                </div>
                            </div>
                            <div class="col">
                                <h1 class="fs-3 fw-bold mb-3">Nama Kue</h1>
                                <h2 class="fs-5 fw-bold">Rp 30.000,00</h2>
                            </div>
                            <div class="col-md-3">
                                <h1 class="fs-3 fw-bold mb-3">Total Bayar</h1>
                                <h2 class="fs-6 fw-bold">Rp 30.000,00</h2>
                                <a href="#" class="btn btn-primer w-100">Bayar</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
    </div>
@endsection
