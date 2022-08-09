@extends('layouts.dashboard')
@section('title', 'Tambah Bahan Baku')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Detil Bahan/h3>
                            <div class="card-tools">
                                <a href="{{ route('detilbahan.index') }}" class="btn btn-sm btn-danger">
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
                        <form action="{{ route('detilbahan.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="user" class="form-label">Produk</label>
                                <select class="form-select form-control" aria-label="Default select example"
                                    name="produk_id">
                                    @foreach ($produk as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_produk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user" class="form-label">Bahan</label>
                                <select class="form-select form-control" aria-label="Default select example"
                                    name="produk_id">
                                    @foreach ($bahan as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_bahan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Jumlah Item</label>
                                <input type="number" name="ukuran" id="ukuran" class="form-control">
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
