@extends('layouts.index')
@section('title', 'Keranjang')
@section('content')
    <!-- Start Cart  -->
    <div class="cart-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-main table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Produk</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Panjang</th>
                                    <th>Lebar</th>
                                    <th>Total</th>
                                    <th>Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
                                            <img class="img-fluid" src="{{ asset('gambar/20220727180544.jpg') }}"
                                                alt="" />
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                            Teralis Jendela
                                        </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>Rp 200000</p>
                                    </td>
                                    <td class="quantity-box"><input type="number" size="4" value="2"
                                            min="0" step="1" class="c-input-text qty text"></td>
                                    <td class="price-pr">
                                        <p>600 mm</p>
                                    </td>
                                    <td class="price-pr">
                                        <p>600 mm</p>
                                    </td>
                                    <td class="total-pr">
                                        <p>Rp 400000</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="#">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
                                            <img class="img-fluid" src="{{ asset('gambar/20220727180544.jpg') }}"
                                                alt="" />
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                            Pagar
                                        </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>Rp 1000000</p>
                                    </td>
                                    <td class="quantity-box"><input type="number" size="4" value="1"
                                            min="0" step="1" class="c-input-text qty text"></td>
                                    <td class="price-pr">
                                        <p>600 mm</p>
                                    </td>
                                    <td class="price-pr">
                                        <p>600 mm</p>
                                    </td>
                                    <td class="total-pr">
                                        <p>Rp 1000000</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="#">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            {{-- Tambah Keranjang --}}
            <div class="row my-5">
                <div class="col">
                    <div class="update-box">
                        <input value="Update Cart" type="submit">
                    </div>
                </div>
            </div>
            {{-- End Tambah Kernjang --}}

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex gr-total">
                            <h5>Sub Total</h5>
                            <div class="ml-auto h5"> Rp 1400000 </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="{{ url('/shop/checkout/1') }}"
                        class="ml-auto btn hvr-hover">Checkout</a>
                </div>
            </div>

        </div>
    </div>
    <!-- End Cart -->
@endsection
