@extends('dashboard.Dashboard_Template')

@section('data')
    <div class="text-center mb-5">
        <h1 class="display-5">Data Kue Kedai Khairaku</h1>
    </div>

    <div class="text-end">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primer" data-bs-toggle="modal" data-bs-target="#tambahKue">
            Tambah Data +
        </button>
    </div>

    <div class="table">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto Kue</th>
                    <th>Nama Kue</th>
                    <th>Jenis Kue</th>
                    <th>Harga Kue</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($kue as $data)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td><img src="{{ asset('foto-kue/' . $data->foto_kue) }}" alt="" width="50"></td>
                        <td>{{ $data->nama_kue }}</td>
                        <td>{{ $data->jenis_kue }}</td>
                        <td>{{ $data->harga_kue }}</td>
                        <td>
                            <button type="button" class="btn btn-warning text-white" data-bs-toggle="modal"
                                data-bs-target="#editKue{{ $data->id }}">
                                <i class="bi bi-pencil"></i>
                            </button>
                            <a href="/admin/delete-kue/{{ $data->id }}" class="btn btn-danger text-white"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>



    <!-- Modal -->
    <form action="/admin/input-kue" method="post" enctype="multipart/form-data">
        @csrf
        <div class="modal fade" id="tambahKue" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Kue</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-2">
                            <label for="nama_kue">Nama Kue</label>
                            <input type="text" name="nama_kue" id="nama_kue" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="jenis_kue">Jenis Kue</label>
                            <select name="jenis_kue" id="jenis_kue" class="form-select">
                                <option selected disabled hidden>Pilih Jenis Kue</option>
                                <option value="Kue Bolu">Kue Bolu</option>
                                <option value="Kue Basah">Kue Basah</option>
                                <option value="Kue Kering">Kue Kering</option>
                            </select>
                        </div>
                        <div class="mb-2">
                            <label for="deskripsi_kue">Deskripsi Kue</label>
                            <textarea name="deskripsi_kue" id="deskripsi_kue" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-2">
                            <label for="harga_kue">Harga Kue</label>
                            <input type="number" name="harga_kue" id="harga_kue" class="form-control">
                        </div>
                        <div class="mb-2">
                            <label for="foto_kue">Foto Kue</label>
                            <input type="file" name="foto_kue" id="foto_kue" class="form-control" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primer">Tambah</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal Edit -->
    @foreach ($kue as $data)
        <form action="/admin/edit-kue/{{ $data->id }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal fade" id="editKue{{ $data->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Edit Data Kue</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-2">
                                <label for="nama_kue">Nama Kue</label>
                                <input type="text" name="nama_kue" id="nama_kue" class="form-control" value="{{ $data->nama_kue}}">
                            </div>
                            <div class="mb-2">
                                <label for="jenis_kue">Jenis Kue</label>
                                <select name="jenis_kue" id="jenis_kue" class="form-select">
                                    <option selected disabled hidden>Pilih Jenis Kue</option>
                                    <option value="Kue Bolu" @if($data->jenis_kue == "Kue Bolu") selected @endif>Kue Bolu</option>
                                    <option value="Kue Basah" @if($data->jenis_kue == "Kue Basah") selected @endif>Kue Basah</option>
                                    <option value="Kue Kering" @if($data->jenis_kue == "Kue Kering") selected @endif>Kue Kering</option>
                                </select>
                            </div>
                            <div class="mb-2">
                                <label for="deskripsi_kue">Deskripsi Kue</label>
                                <textarea name="deskripsi_kue" id="deskripsi_kue" rows="5" class="form-control">{{ $data->deskripsi_kue }}</textarea>
                            </div>
                            <div class="mb-2">
                                <label for="harga_kue">Harga Kue</label>
                                <input type="number" name="harga_kue" id="harga_kue" class="form-control" value="{{ $data->harga_kue }}">
                            </div>
                            <div class="mb-2">
                                <label for="foto_kue">Foto Kue</label>
                                <input type="file" name="foto_kue" id="foto_kue" class="form-control"
                                    accept="image/*">
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
