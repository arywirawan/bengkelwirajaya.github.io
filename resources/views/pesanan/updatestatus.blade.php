@extends('layouts.dashboard')
@section('title', 'Update Status Pesanan')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Update Status</h3>
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
                        <form action="{{ route('update.status', $pesanan->id) }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="user" class="form-label">Pilih Status</label>
                                <select class="form-select form-control" aria-label="Default select example" name="status">

                                    <option value="{{ $pesanan->status }} "selected">
                                        {{ $pesanan->status }}
                                    </option>

                                    <option value="Belum dibayar">Belum dibayar</option>
                                    <option value="Sedang dikerjakan">Sedang dikerjakan</option>
                                    <option value="Selesai dikerjakan">Selesai dikerjakan</option>
                                    <option value="Pesanan selesai">Selesai</option>
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
