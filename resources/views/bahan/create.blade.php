@extends('layouts.dashboard')
@section('title', 'Tambah Bahan Baku')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Bahan Baku</h3>
                        <div class="card-tools">
                            <a href="{{ route('bahan.index') }}" class="btn btn-sm btn-danger">
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
                        <form action="{{ route('bahan.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_kategori">Nama Bahan</label>
                                <input type="text" name="nama_bahan" id="nama_bahan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Ukuran</label>
                                <input type="text" name="ukuran" id="ukuran" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Harga</label>
                                <input type="text" name="harga" id="harga" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Stok</label>
                                <input type="number" name="stok" id="stok" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="user" class="form-label">User Input</label>
                                <select class="form-select form-control" aria-label="Default select example" name="user_id">
                                    <option selected>Silahkan pilih-</option>
                                    @foreach ($user as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
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
