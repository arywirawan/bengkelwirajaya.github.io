@extends('layouts.dashboard')
@section('title', 'Ubah Bahan Baku')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Pesanan</h3>
                        <div class="card-tools">
                            <a href="{{ route('pesanan.index') }}" class="btn btn-sm btn-danger">
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
                        <form action="{{ route('pesanan.update', 1) }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="User">User</label>
                                <input type="text" name="id_user" id="id_user" class="form-control" value="Bayu"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="Produk">Produk</label>
                                <input type="text" name="id_produk" id="id_produk" class="form-control"
                                    value="Teralis Jendela" disabled>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Panjang">Panjang</label>
                                    <div class="form-inline">
                                        <input type="number" class="form-control" id="panjang" name="panjang"
                                            value="600" disabled>
                                        <label for="">mm</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Lebar">Lebar</label>
                                    <div class="form-inline">
                                        <input type="number" class="form-control" id="lebar" name="lebar"
                                            value="600" disabled>
                                        <label for="">mm</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" value="1"
                                    disabled>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Harga Total</label>
                                <input type="text" name="harga_total" id="harga" class="form-control"
                                    value="Rp 7000000" disabled>
                            </div>
                            <div class="form-group">
                                <label for="user" class="form-label">Status Pesanan</label>
                                <select class="form-select form-control" aria-label="Default select example" name="user_id">
                                    <option value="">Silahkan pilih-</option>
                                    <option selected>Belum Dibayar</option>
                                    <option value="">Sedang Dikerjakan</option>
                                    <option value="">Selesai Dikerjakan</option>
                                    <option value="">Dikirim</option>
                                    <option value="">Selesai</option>
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
