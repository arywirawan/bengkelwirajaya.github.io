@extends('layouts.index')
@section('title', 'Detail Produk')
@section('content')
    <!-- Start Shop Detail  -->
    {{-- @php
        var_dump($detilBahan[0]);
    @endphp --}}
    <div class="shop-detail-box-main">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-6">
                    <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                        <div class="carousel-inner" role="listbox">
                            <div class="carousel-item active"> <img class="d-block w-100"
                                    src="{{ asset('gambar/' . $produk->foto_produk) }}" alt="First slide"> </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-6">
                    <div class="single-product-details">
                        <input type="hidden" id="produk_id" value="{{ $produk->id }}" readonly>
                        <input type="hidden" id="harga" value="{{ $produk->harga_jasa }}" readonly>
                        <input type="hidden" id="nama_produk" value="{{ $produk->nama_produk }}" readonly>
                        <input type="hidden" id="max-heigh" value="200" readonly>
                        <input type="hidden" id="max-width" value="300" readonly>

                        <h2>{{ $produk->nama_produk }}</h2>
                        <h5>Rp {{ $produk->harga_jasa }}</h5>
                        <p>
                        <h4>Deskripsi : </h4>
                        <p>{{ $produk->deskripsi }}</p>
                        <ul>
                            <li>
                                <div class="form-group quantity-box">
                                    <label class="control-label">Quantity</label>
                                    <input class="form-control" id="qty" value="0" min="0" max="20"
                                        type="number">
                                </div>
                                <div class="form-row">
                                    <div class="form-group quantity-box col-md-6">
                                        <label class="control-label">Panjang</label>
                                        <input class="form-control" id="panjang" value="0" min="0"
                                            max="20" type="number">

                                    </div>
                                    <div class="form-group quantity-box col-md-6">
                                        <label class="control-label">Lebar</label>
                                        <input class="form-control" id="lebar" value="0" min="0"
                                            max="20" type="number">
                                    </div>
                                </div>

                            </li>
                        </ul>

                        <div class="price-box-bar">
                            <div class="cart-and-bay-btn">
                                <a class="btn hvr-hover" data-fancybox-close="" href="#" onclick="">Add to
                                    cart</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
@endsection
