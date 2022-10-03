@extends('layouts.dashboard')
@section('title', 'Ubah Pembayaran')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Edit Pembayaran</h3>
                        <div class="card-tools">
                            <a href="{{ route('pembayaran.index') }}" class="btn btn-sm btn-danger">
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
                        <form action="{{ route('pembayaran.update', $pembayaran->id) }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="Produk">ID Pesanan</label>
                                <input type="text" name="pesanan_id" id="pesanan_id" class="form-control"
                                    value="{{ $pembayaran->pesanan_id }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="User">User</label>
                                <input type="text" name="user_id" id="id_user" class="form-control"
                                    value="{{ $pembayaran->user->name }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="Produk">Bank</label>
                                <input type="text" name="bank" id="bank" class="form-control"
                                    value="{{ $pembayaran->bank }}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="user" class="form-label">Status Pesanan</label>
                                <select class="form-select form-control" aria-label="Default select example" name="status">
                                    <option value="{{ $pembayaran->status }}" selected>{{ $pembayaran->status }}</option>
                                    <option value="Belum Terkonfirmasi">Belum Terkonfirmasi</option>
                                    <option value="Terkonfirmasi">Terkonfirmasi</option>
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
