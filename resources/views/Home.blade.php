@extends('Template')

@section('konten')
    <section id="header">
        {{-- <div class="container"> --}}
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/web/banner.jpg') }}" class="d-block w-100 carousel-image" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/web/banner2.jpg') }}" class="d-block w-100 carousel-image" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/web/banner3.jpg') }}" class="d-block w-100 carousel-image" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        {{-- </div> --}}
    </section>

    <section id="Best">
        <div class="container my-5 py-5">
            <div class="text-center mb-5">
                <h1 class="fs-1">Favorit</h1>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-5 mb-5">
                @foreach($favorit as $data)
                    <div class="col ">
                        <div class="card h-100 shadow mb-5 bg-body rounded border-0">
                            <img src="{{ asset('foto-kue/'. $data->foto_kue) }}" class="card-img-top foto-kue"
                                alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title fs-3">{{ $data->nama_kue }}</h5>
                                <p class="card-text fw-bold">Rp {{ number_format($data->harga_kue) }}</p>
                                <a href="/pembelian/{{ $data->id }}" class="btn btn-primer w-100"> Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="/kue/favorit" class="btn btn-primer p-2">Lihat Semua <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <section id="Terbaru" class="bg-light">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h1 class="fs-1">Keluaran Terbaru</h1>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-5 mb-5">
                @foreach($terbaru as $data)
                <div class="col">
                        <div class="card h-100 ">
                            <img src="{{ asset('foto-kue/'. $data->foto_kue) }}"
                                class="card-img-top foto-kue" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title fs-3">{{ $data->nama_kue }}</h5>
                                <p class="card-text fw-bold">Rp {{ number_format($data->harga_kue) }}</p>
                                <a href="/pembelian/{{ $data->id }}" class="btn btn-primer w-100"> Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center">
                <a href="/kue/terbaru" class="btn btn-primer p-2">Lihat Semua <i class="bi bi-arrow-right"></i></a>
            </div>
        </div>
    </section>
    <section id="Kostum">
        <div class="container py-5">
            <div class="text-center mb-5">
                <h1 class="fs-1">Pilih Jenis Kue</h1>
            </div>

            <div class="row row-cols-1 row-cols-md-3 g-5 mb-5">
                {{-- Kue Basah --}}
                <div class="col">
                    <div class="card h-100 shadow-lg mb-5 bg-body rounded border-0">
                        <img src="{{ asset('img/foto-kue/Classic Cheese CreamRoll Cake.jpg') }}"
                            class="card-img-top foto-kue mb-2" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title fs-2 mb-5">Kue Basah</h5>
                            {{-- <p class="card-text fw-bold my-5">Rp 5.000 - Rp 25.000</p> --}}
                            <a href="/kue/jenis/Kue Basah" class="btn btn-primer w-100">Pilih Kue</a>
                        </div>
                    </div>
                </div>

                {{-- Kue Kering --}}
                <div class="col">
                    <div class="card h-100 shadow-lg mb-5 bg-body rounded border-0">
                        <img src="{{ asset('img/foto-kue/Butter Cookies with White Chocolate Christmas Decor.jpg') }}"
                            class="card-img-top foto-kue mb-2" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title fs-2 mb-5">Kue Kering</h5>
                            {{-- <p class="card-text fw-bold my-5">Rp 5.000 - Rp 25.000</p> --}}
                            <a href="/kue/jenis/Kue Kering" class="btn btn-primer w-100">Pilih Kue</a>
                        </div>
                    </div>
                </div>

                {{-- Kue Bolu --}}
                <div class="col">
                    <div class="card h-100 shadow-lg mb-5 bg-body rounded border-0">
                        <img src="{{ asset('img/foto-kue/Premium Chocolate Deluxe Cake Layer.jpg') }}"
                            class="card-img-top foto-kue mb-2" alt="...">
                        <div class="card-body text-center">
                            <h5 class="card-title fs-2 mb-5">Kue Bolu</h5>
                            {{-- <p class="card-text fw-bold my-5">Rp 5.000 - Rp 25.000</p> --}}
                            <a href="/kue/jenis/Kue Bolu" class="btn btn-primer w-100">Pilih Kue</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
