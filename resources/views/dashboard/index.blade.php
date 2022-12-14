@extends('layouts.dashboard')
@section('title', 'Dashboard')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6 col-lg-3">
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ count($pesanan) }}</h3>

                        <p>Pesanan</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="{{ route('pesanan.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ count($produk) }}</h3>

                        <p>Produk</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="{{ route('produk.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <div class="col-6 col-lg-3">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ count($user) }}</h3>

                        <p>Member</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="{{ route('customer.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-6 col-lg-3">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ count($pembayaran) }}</h3>

                        <p>Transaksi</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="{{ route('pembayaran.index') }}" class="small-box-footer">More info <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
