@extends('layouts.dashboard')
@section('title', 'Ubah Detil Produk')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col col-lg-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Form Detil Bahan</h3>

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
                        <button id="addform" class="btn btn-default">Tambah Form Bahan</button>
                        <button id="deleteform" class="btn btn-danger">Delete Form Bahan</button>

                        <form action="{{ route('detilbahan.update', $detilbahan->id) }}" enctype="multipart/form-data"
                            method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="user" class="form-label">Produk</label>
                                <select class="form-select form-control" name="produk_id">
                                    @foreach ($produk as $item)
                                        <option value="{{ $item->id }}">{{ $item->nama_produk }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="group-form-bahan">
                                <?php
                                $bahan_id = explode(',', $detilbahan->bahan_id);
                                $jumlah_item = explode(',', $detilbahan->jumlah_item);
                                foreach ($bahan_id as $key => $value):
                                ?>
                                <div class="border-top p-1 border-radius mt-3 mb-3 bahan-form">
                                    <div class="form-group">
                                        <label for="user" class="form-label">Bahan</label>
                                        <select class="form-select form-control selectbahan" name="bahan_id[]"
                                            onchange="totalFunction()">
                                            @foreach ($bahan as $item)
                                                <option value="{{ $item->id }}" data-price={{ $item->harga }}
                                                    {{ $value == $item->id ? 'selected' : '' }}>
                                                    {{ $item->nama_bahan }} (Rp.{{ $item->harga }})</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jumlah">Jumlah Item</label>
                                        <input type="number" name="jumlah_item[]" class="form-control jumlah"
                                            value="{{ $jumlah_item[$key] }}" onkeyup="totalFunction()">
                                    </div>
                                </div>
                                <?php endforeach;?>
                            </div>

                            <div class="form-group">
                                <label for="total">Total Biaya</label>
                                <div>Rp.</div>
                                <input type="int" class="form-control" id="total" value='0' readonly="readonly"
                                    name="total_harga">
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


@section('custome_js')
    <script src="{{ asset('js/custome/detilbahan.js') }}"></script>
@endsection
