@extends('Template')

@section('konten')
    <div class="container py-5">

        <div class="row row-cols-1 row-cols-md-3 g-5 mb-5">
            <div class="col">
                <img src="{{ asset('foto-kue/' . $kue->foto_kue) }}" class="card-img-top foto-kue mb-2" alt="...">
            </div>
            <div class="col">
                <h1 class="fs-1 fw-bold">{{ $kue->nama_kue }}</h1>
                <h2 class="fs-2">Rp {{ number_format($kue->harga_kue) }}</h2>
                <div class="mt-4">
                    <h2 class="fs-4 fw-bold">Deskripsi Kue</h2>
                    <p>{{ $kue->deskripsi_kue }}</p>
                </div>
            </div>
            <div class="col">
                <div class="card p-2">
                    <div class="card-body">
                        <form action="/pesan-kue/{{ $kue->id }}" method="post">
                            @csrf
                            <div class="card-title fw-bold fs-4">Pesan Kue</div>
                            <div class="my-3">
                                <label for="alamat">Alamat Dikirim</label>
                                <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
                            </div>
                            <div class="my-3">
                                <label for="jumlah">Jumlah Kue Dipesan</label>
                                <input type="text" name="jumlah" id="jumlah" class="form-control w-50"
                                    value="1">
                            </div>
                            <h2 class="fs-5">Total Harga</h2>
                            <h2 class="fs-5 fw-bold" id="total">Rp {{ number_format($kue->harga_kue) }}</h2>
                            <button type="submit" class="btn btn-primer w-100">Pesan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Testimoni --}}
        <div class="mt-4">
            @foreach ($testimoni as $testi)
                @foreach ($user as $nama)
                    @if ($nama->id == $testi->user_id)
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="foto-testimoni text-center">
                                            <i class="bi bi-person-circle display-1"></i>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <h1 class="fs-3 fw-bold mb-3">{{ $nama->name }}</h1>
                                        <p class="text-justify">{{ $testi->testimoni }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>


    <script>
        const input = document.getElementById('jumlah');
        const text = document.getElementById('total');

        const rupiah = (number) => {
            return new Intl.NumberFormat("id-ID", {
                style: "currency",
                currency: "IDR"
            }).format(number);
        }

        input.addEventListener('change', updateValue);

        function updateValue(e) {
            text.textContent = rupiah(e.target.value * 30000);
        }
    </script>
@endsection
