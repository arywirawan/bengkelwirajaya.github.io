@extends('layouts.index')
@section('title', 'Pesanan')
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
                                    <th>ID Pembayaran</th>
                                    <th>ID Pesanan</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="name-pr">
                                        <a href="#">
                                            1
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                            1
                                        </a>
                                    </td>
                                    <td class="price-pr">
                                        <span class="badge badge-danger">Belum Dikofirmasi</span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
@endsection
