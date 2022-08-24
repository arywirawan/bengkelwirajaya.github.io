@extends('layouts.index')
@section('title', 'Order')
@section('content')

    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="checkout-address">
                        <div class="title-left">
                            <h3>Tujuan</h3>
                        </div>
                        <form class="needs-validation" novalidate>
                            <div class="mb-3">
                                <label for="nama">Nama</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="name" placeholder="" name="name"
                                        value="Gede" required disabled>
                                    <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder=""
                                    value="gede@gmail.com" disabled>
                                <div class="invalid-feedback"> Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="notelp">No Telepon</label>
                                <input type="text" class="form-control" id="notelp" name="notelp" placeholder=""
                                    required disabled value="08962172172721">
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder=""
                                    value="Jl. Raya Puputan Renon No.3x Denpasar" disabled>
                            </div>
                            {{-- pembayaram --}}
                            <div class="title-left">
                                <h3>Pembayaran</h3>
                            </div>
                            <div class="d-block my-3">
                                <div class="form-group">
                                    <td>
                                        <img src="{{ asset('images/payment-icon/bca.png') }}" alt=""
                                            style="width: 60px">
                                    </td>
                                    <td>&nbsp; &nbsp; &nbsp;</td>
                                    <td>
                                        <label class="" for="credit">8735089xxx</label>
                                    </td>

                                </div>
                                <div class="form-group">
                                    <td>
                                        <img src="{{ asset('images/payment-icon/bni.png') }}" alt=""
                                            style="width: 60px">
                                    </td>
                                    <td>&nbsp; &nbsp; &nbsp;</td>
                                    <td>
                                        <label class="" for="credit">0105189xxx</label>
                                    </td>
                                </div>
                                <div class="form-group">
                                    <td>
                                        <img src="{{ asset('images/payment-icon/bpd.png') }}" alt=""
                                            style="height: 60px">
                                    </td>
                                    <td>&nbsp; &nbsp; &nbsp;</td>
                                    <td>
                                        <label class="" for="credit">0101212897xxx</label>
                                    </td>
                                </div>
                            </div>
                            <hr class="mb-1">
                        </form>
                    </div>
                </div>

                {{-- Detil Order --}}
                <div class="col-sm-6 col-lg-6 mb-3">
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Pesanan Anda</h3>
                                </div>
                                <div class="rounded p-2 bg-light">
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="{{ url('/shop/1') }}">Teralis Jendela</a>
                                            <div class="small text-muted">
                                                Harga: Rp
                                                <span class="item-total-harga">200000</span>
                                                <span class="mx-2">|</span>
                                                Qty:
                                                <span class="item-qty">2</span>
                                                <span class="mx-2">|</span>
                                                Subtotal: Rp
                                                <span class="item-sub-total">400000</span>
                                                <span class="mx-2">|</span> Panjang:
                                                <span class="item-panjang">600</span> mm
                                                <span class="mx-2">|</span>
                                                Lebar:
                                                <span class="lebar">600</span> mm
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-12">
                            <div class="odr-box">
                                <div class="title-left">
                                    <h3>Detil Harga</h3>
                                </div>
                                <div class="d-flex">
                                    <div class="font-weight-bold">Product</div>
                                    <div class="ml-auto font-weight-bold">Total</div>
                                </div>
                                <hr class="my-1">
                                <div class="d-flex">
                                    <h4>Sub Total</h4>
                                    <div class="ml-auto font-weight-bold"> Rp <span id="sub-total">1400000</span> </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Biaya Bahan Baku</h4>
                                    <div class="ml-auto font-weight-bold"> Rp <span id="biaya-bahan-baku">1000000</span> </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Ongkos Kirim</h4>
                                    <div class="ml-auto font-weight-bold"> Gratis </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> Rp <span id="grand-total">1000000</span> </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <div class="col-12 d-flex shopping-box"> <a href="checkout.html"
                                class="ml-auto btn hvr-hover">Place Order</a> </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
@endsection
