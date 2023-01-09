@extends('Template')

@section('konten')
    <div class="container py-5">

        <div class="row row-cols-1 row-cols-md-3 g-5 mb-5">
            <div class="col">
                <img src="{{ asset('img/foto-kue/Pumpkin Spice Biscoff Cake.jpg') }}" class="card-img-top foto-kue mb-2"
                    alt="...">
            </div>
            <div class="col">
                <h1 class="fs-1 fw-bold">Nama Kue</h1>
                <h2 class="fs-2">Rp 30.000,00</h2>
                <div class="mt-4">
                    <h2 class="fs-4 fw-bold">Bahan Bahan Kue</h2>
                    <ul>
                        <li>Telor</li>
                        <li>Krim Susu</li>
                        <li>Coklat</li>
                        <li>Tepung</li>
                        <li>Gula</li>
                    </ul>
                </div>
            </div>
            <div class="col">
                <div class="card p-2">
                    <div class="card-body">
                        <div class="card-title fw-bold fs-4">Pesan Kue</div>
                        <div class="my-3">
                            <label for="jumlah">Jumlah Kue Dipesan</label>
                            <input type="text" name="jumlah" id="jumlah" class="form-control w-50" value="1">
                        </div>
                        <h2 class="fs-5">Total Harga</h2>
                        <h2 class="fs-5 fw-bold" id="total">Rp 30.000,00</h2>
                        <a href="#" class="btn btn-primer w-100">Pesan</a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Testimoni --}}
        <div class="mt-4">
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
                                <h1 class="fs-3 fw-bold mb-3">Nama User</h1>
                                <p class="text-justify">Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde labore
                                    necessitatibus obcaecati veniam cupiditate enim voluptate omnis aut nostrum sint ad
                                    saepe
                                    dolore, harum aliquam explicabo nisi laboriosam error officiis!</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endfor
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
