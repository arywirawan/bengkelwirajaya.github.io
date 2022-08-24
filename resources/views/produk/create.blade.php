@extends('layouts.dashboard')
@section('title', 'Tambah Produk')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Produk</h3>
                        <div class="card-tools">
                            <a href="{{ route('produk.index') }}" class="btn btn-sm btn-danger">
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
                        <form action="{{ route('produk.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="nama_kategori">Nama</label>
                                <input type="text" name="nama_produk" id="nama_produk" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="formFile" class="form-label">Foto</label>
                                <input class="form-control col-sm-4" type="file" id="foto_produk" name="foto_produk">
                            </div>
                            <div class="form-group">
                                <label for="nama_kategori">Harga</label>
                                <input type="text" name="harga_jasa" id="harga_jasa" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" cols="30" rows="5" class="form-control"></textarea>
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
