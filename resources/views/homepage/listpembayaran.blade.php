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
                                    <th>Bank</th>
                                    <th>Status Pembayaran</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bayar as $item)
                                    <tr>
                                        <td class="name-pr">
                                            <a href="#">
                                                {{ $item->id }}
                                            </a>
                                        </td>
                                        <td class="name-pr">
                                            <a href="#">
                                                {{ $item->pesanan_id }}
                                            </a>
                                        </td>
                                        <td class="price-pr">
                                            {{ $item->bank }}
                                        </td>
                                        <td class="price-pr">
                                            @if ($item->status == 'Belum Terkonfirmasi')
                                                <span class="badge badge-danger">{{ $item->status }}</span>
                                            @else
                                                <span class="badge badge-success">{{ $item->status }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart -->
@endsection
