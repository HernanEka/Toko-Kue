@extends('Template')

@section('konten')
    <div class="container my-5">
        <div class="text-center mb-5">
            <h1 class="fs-1">Keranjang</h1>
        </div>

        @foreach ($pesan as $data)
            @foreach ($kue as $kuee)
                @if ($kuee->id == $data->kue_id)
                    <div class="card mb-2">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="foto-testimoni">
                                        <img src="{{ asset('foto-kue/' . $kuee->foto_kue) }}"
                                            class="card-img-top foto-testi mb-2" alt="...">
                                    </div>
                                </div>
                                <div class="col">
                                    <h1 class="fs-3 fw-bold mb-3">{{ $kuee->nama_kue }}</h1>
                                    <h2 class="fs-5 fw-bold">Rp {{ number_format($kuee->harga_kue) }}</h2>
                                    <p>Jumlah Beli : {{ $data->jumlah_beli }}</p>
                                </div>
                                <div class="col-md-3">
                                    <h1 class="fs-3 fw-bold mb-3">Total Bayar</h1>
                                    <h2 class="fs-6 fw-bold">Rp {{ number_format($kuee->harga_kue * $data->jumlah_beli) }}
                                    </h2>
                                    <p>Status : {{ $data->status }}</p>

                                    @if ($data->status == 'Belum Dibayar')
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primer w-100" data-bs-toggle="modal"
                                            data-bs-target="#modalBayar{{ $data->id }}">
                                            Bayar
                                        </button>
                                    @endif
                                    @foreach ($testimoni as $testi)
                                        @if ($data->id == $testi->pemesanan_id)
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primer w-100" data-bs-toggle="modal"
                                                data-bs-target="#modalHasilTestimoni{{ $data->id }}">
                                                Lihat Testimoni
                                            </button>

                                            <div class="modal fade" id="modalHasilTestimoni{{ $data->id }}"
                                                data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="staticBackdropLabel">Testimoni Anda</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p>{{ $testi->testimoni}}</p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @elseif ($data->status == 'Pesanan Dikirim')
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primer w-100" data-bs-toggle="modal"
                                                data-bs-target="#modalTestimoni{{ $data->id }}">
                                                Beri testimoni
                                            </button>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach


            <!-- Modal -->
            <form action="/bayar/{{ $data->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal fade" id="modalBayar{{ $data->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Upload Bukti Bayar</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="file" name="bukti_bayar" id="bayar" class="form-control">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primer">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Modal -->
            <form action="/testimoni/{{ $data->id }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal fade" id="modalTestimoni{{ $data->id }}" data-bs-backdrop="static"
                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel">Testimoni</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="number" name="kue_id" value="{{ $data->kue_id }}" hidden>
                                <textarea name="testimoni" id="testimoni" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primer">Understood</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        @endforeach
    </div>
@endsection
