@extends('layouts.dashboard')
@section('title', 'Ubah Kategori')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Kategori</h3>
                        <div class="card-tools">
                            <a href="{{ route('kategori.index') }}" class="btn btn-sm btn-danger">
                                Tutup
                            </a>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> Ada kesalahan dalam input Anda.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="card-body">
                        <form action="{{ route('kategori.update', $kategori->id) }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nama_kategori">Nama Kategori</label>
                                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control"
                                    value="{{ $kategori->nama_kategori }}">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi_kategori" id="deskripsi_kategori" cols="30" rows="5" class="form-control">{{ $kategori->deskripsi_kategori }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="formFile" class="form-label">Foto Lama</label>
                                <img src="/gambar/{{ $kategori->foto }}" alt="" style="width:100px">
                            </div>
                            <div class="form-group">
                                <label for="formFile" class="form-label">Foto</label>
                                <input class="form-control col-sm-4" type="file" id="foto" name="foto">
                            </div>
                            <div class="form-group">
                                <label for="user" class="form-label">User Input</label>
                                <select class="form-select form-control" aria-label="Default select example" name="user_id">
                                    <option selected>Silahkan pilih-</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}"
                                            @if ($kategori->user_id == $item->id) selected="selected" @endif>
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
