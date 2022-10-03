@extends('layouts.dashboard')
@section('title', 'Ubah Pesanan ')
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
                        <form action="{{ route('pesanan.update', $pesanan->id) }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="User">User</label>
                                <input type="text" name="id_user" id="id_user" class="form-control"
                                    value="{{ $pesanan->user->name }}" disabled>
                            </div>
                            @foreach ($pesanan->listpesanan as $listpesanankey => $value)
                            <div class="form-group">
                                <label for="Produk">Produk</label>
                                <input type="text" name="id_produk" id="id_produk" class="form-control"
                                    value="{{ $value->nama_produk }}" disabled>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="Panjang">Panjang</label>
                                    <div class="form-inline">
                                        <input type="number" class="form-control" id="panjang" name="panjang"
                                            value="{{ $value->panjang }}"disabled>
                                        <label for="">mm</label>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="Lebar">Lebar</label>
                                    <div class="form-inline">
                                        <input type="number" class="form-control" id="lebar" name="lebar"
                                            value="{{ $value->lebar }}" disabled>
                                        <label for="">mm</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Jumlah</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control"
                                    value="{{ $value->kuantitas }}" disabled>
                            </div>
                            @endforeach
                            
                            <div class="form-group">
                                <label for="deskripsi">Harga Total</label>
                                <input type="text" name="harga_total" id="harga" class="form-control"
                                    value="{{ $pesanan->harga_total }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="user" class="form-label">Status Pesanan</label>
                                <select class="form-select form-control" aria-label="Default select example" name="status">
                                    <option value="{{ $pesanan->status }}" selected>{{ $pesanan->status }}</option>
                                    <option value="Belum Dibayar">Belum Dibayar</option>
                                    <option value="Sedang Dikerjakan">Sedang Dikerjakan</option>
                                    <option value="Selesai Dikerjakan">Selesai Dikerjakan</option>
                                    <option value="Sedang Dikirim">Sedang Dikirim</option>
                                    <option value="Selesai">Selesai</option>
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
