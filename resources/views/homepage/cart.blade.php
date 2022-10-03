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
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $subtotal = 0 ?>
                                @if (session('cart'))
                                    @foreach (session('cart') as $id => $details)
                                    <?php $subtotal += $details['harga_jasa'] * $details['kuantitas'] ?>
                                    <tr>
                                        <td class="thumbnail-img">
                                            <a href="#">
                                                <img class="img-fluid" src="{{ asset('gambar/'.$details['foto_produk']) }}"
                                                    alt="" />
                                            </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="#">
                                                {{ $details['nama_produk'] }}
                                            </a>
                                        </td>
                                        <td class="price-pr">
                                            <p>Rp {{ $details['harga_jasa'] }}</p>
                                        </td>
                                        <td class="quantity-box"><input type="number" size="4" value="{{ $details['kuantitas'] }}"
                                                min="0" class="c-input-text kuantitas text"></td>
                                        <td class="price-pr">
                                            <p>{{ $details['panjang'] }} mm</p>
                                        </td>
                                        <td class="price-pr">
                                            <p>{{ $details['lebar'] }} mm</p>
                                        </td>
                                        <td class="total-pr">
                                            <p>Rp {{ $details['total'] }}</p>
                                        </td>
                                        <td class="actions" data-th="">
                                            <button class="btn btn-sm update-cart" data-id="{{ $id }}">
                                                <i class="fas fa-refresh"></i>
                                            </button>
                                            <button class="btn btn-sm remove-cart" data-id="{{ $id }}">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="row my-5">
                <div class="col-lg-8 col-sm-12"></div>
                <div class="col-lg-4 col-sm-12">
                    <div class="order-box">
                        <h3>Order summary</h3>
                        <div class="d-flex gr-total">
                            <h5>Sub Total</h5>
                            <div class="ml-auto h5"> Rp {{ $subtotal }} </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-12 d-flex shopping-box"><a href="{{ url('/checkout') }}"
                        class="ml-auto btn hvr-hover">Checkout</a>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(".update-cart").click(function (e) {
           e.preventDefault();
           var ele = $(this);
            $.ajax({
               url: '{{ url('update-cart') }}',
               method: "patch",
               data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), kuantitas: ele.parents("tr").find(".kuantitas").val()},
               success: function (response) {
                   window.location.reload();
               }
            });
        });
        $(".remove-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Kamu yakin menghapus item?")) {
                $.ajax({
                    url: '{{ url('remove-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
    <!-- End Cart -->
@endsection
