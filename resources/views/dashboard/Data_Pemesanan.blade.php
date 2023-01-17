@extends('dashboard.Dashboard_Template')

@section('data')
    <div class="text-center mb-5">
        <h1 class="display-5">Data Pemesanan Kue</h1>
    </div>


    <div class="table">
        <table class="table">
            <thead>
                <th>No</th>
                <th>Nama Kue</th>
                <th>Nama Pembeli</th>
                <th>Jumlah Beli</th>
                <th>Alamat Pembeli</th>
                <th>Total</th>
                <th>Status</th>
                <th>Bukti Bayar</th>
                <th>Action</th>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($pesan as $data)
                    @foreach ($user as $orang)
                        @if ($orang->id == $data->user_id)
                            @foreach ($kue as $kuee)
                                @if ($kuee->id == $data->kue_id)
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $kuee->nama_kue }}</td>
                                    <td>{{ $orang->name }}</td>
                                    <td>{{ $data->jumlah_beli }}</td>
                                    <td>{{ $data->alamat }}</td>
                                    <td>Rp {{ number_format($data->jumlah_beli * $kuee->harga_kue) }}</td>
                                    <td>{{ $data->status }}</td>
                                    <td><img src="{{ asset('foto-bukti-bayar/' . $data->bukti_bayar) }}" width="30"></td>
                                    <td>
                                        <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal"
                                            data-bs-target="#editKue{{ $data->id }}">
                                            <i class="bi bi-pencil"></i>
                                        </button>
                                    </td>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- Modal Edit -->
    @foreach ($pesan as $data)
        <form action="/admin/edit-status/{{ $data->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="editKue{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false"
                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Status Pesanan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="status">Jenis Kue</label>
                                <select name="status" id="status" class="form-select">
                                    <option value="Belum Dibayar" @if ($data->status == 'Belum Dibayar') selected @endif>Belum
                                        DIbayar
                                    </option>
                                    <option value="Verifikasi Pembayaran" @if ($data->status == 'Verifikasi Pembayaran') selected @endif>
                                        Verifikasi Pembayaran
                                    </option>
                                    <option value="Pesanan Dibuat" @if ($data->status == 'Pesanan Dibuat') selected @endif>Pesanan
                                        Dibuat
                                    <option value="Pesanan Dikirim" @if ($data->status == 'Pesanan Dikirim') selected @endif>
                                        Pesanan Dikirim
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primer">Edit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endforeach
@endsection
