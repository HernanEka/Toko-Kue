@extends('Template')

@section('konten')
    <section id="Daftar-Kue">
        <div class="container my-5 py-5">
            <div class="text-center mb-5">
                <h1 class="fs-1">Daftar Kue @if(isset($keterangan)) {{ $keterangan }} @endif</h1>
            </div>
            <div class="row row-cols-1 row-cols-md-3 g-5 mb-5">
                @foreach ($kue as $data)
                    <div class="col ">
                        <div class="card h-100 shadow mb-5 bg-body rounded border-0">
                            <img src="{{ asset('foto-kue/' . $data->foto_kue) }}" class="card-img-top foto-kue" alt="...">
                            <div class="card-body text-center">
                                <h5 class="card-title fs-3">{{ $data->nama_kue }}</h5>
                                <p class="card-text fw-bold">Rp {{ number_format($data->harga_kue) }}</p>
                                <a href="/pembelian/{{ $data->id }}" class="btn btn-primer w-100"> Pesan Sekarang</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
