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
                                        value="{{ $user->name }}" required disabled>
                                    <div class="invalid-feedback" style="width: 100%;"> Your username is required. </div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder=""
                                    value="{{ $user->email }}" disabled>
                                <div class="invalid-feedback"> Please enter a valid email address for shipping updates.
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="notelp">No Telepon</label>
                                <input type="text" class="form-control" id="notelp" name="notelp" placeholder=""
                                    required disabled value="{{ $user->notelp }}">
                                <div class="invalid-feedback"> Please enter your shipping address. </div>
                            </div>
                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder=""
                                    value="{{ $user->alamat }}" disabled>
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
                                    <?php $subtotal = 0 ?>
                                    @foreach ($cart as $id => $details)
                                    <?php $subtotal += $details['harga_jasa'] * $details['kuantitas'] ?>
                                    <div class="media mb-2 border-bottom">
                                        <div class="media-body"> <a href="{{ url('/shop/'.$id) }}">{{ $details['nama_produk'] }}</a>
                                            <div class="small text-muted">
                                                Harga: Rp
                                                <span class="item-total-harga">{{ $details['harga_jasa'] }}</span>
                                                <span class="mx-2">|</span>
                                                Qty:
                                                <span class="item-qty">{{ $details['kuantitas'] }}</span>
                                                <span class="mx-2">|</span>
                                                Subtotal: Rp
                                                <span class="item-sub-total">{{ $details['total'] }}</span>
                                                <span class="mx-2">|</span> Panjang:
                                                <span class="item-panjang">{{ $details['panjang'] }}</span> mm
                                                <span class="mx-2">|</span>
                                                Lebar:
                                                <span class="lebar">{{ $details['lebar'] }}</span> mm
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    
                                    
                                    
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
                                    <div class="ml-auto font-weight-bold"> Rp <span id="sub-total">{{ $subtotal }}</span> </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Biaya Bahan Baku</h4>
                                        <div class="ml-auto font-weight-bold"> Rp <span id="biaya-bahan-baku">{{ $totalbahan }}</span> </div>
                                </div>
                                <div class="d-flex">
                                    <h4>Ongkos Kirim</h4>
                                    <div class="ml-auto font-weight-bold"> Gratis </div>
                                </div>
                                <hr>
                                <div class="d-flex gr-total">
                                    <h5>Grand Total</h5>
                                    <div class="ml-auto h5"> Rp <span id="grand-total">{{ $subtotal + $totalbahan }}</span> </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                        <form action="{{ route('checkoutpesanan') }}" method="POST">
                            @csrf
                            <input name="user_id" type="hidden" value="{{ auth()->user()->id }}">
                        @foreach ($cart as $id => $details)
                            
                            <input name="produk_id[]" type="hidden" value="{{ $id }}">
                            <input name="panjang[]" type="hidden" value="{{ $details['panjang'] }}">
                            <input name="lebar[]" type="hidden" value="{{ $details['lebar'] }}">
                            <input name="kuantitas[]" type="hidden" value="{{ $details['kuantitas'] }}">
                            
                        @endforeach
                        
                        <input name="harga_total" type="hidden" value="{{ $subtotal + $totalbahan }}">
                        <div class="col-12 d-flex shopping-box"> <button class="ml-auto btn hvr-hover text-white" type="submit">Place Order</button></div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
@endsection
