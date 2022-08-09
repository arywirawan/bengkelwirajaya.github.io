@extends('layouts.index')
@section('title', 'Beranda')
@section('content')
    <!-- Start Slider -->
    <div id="slides-shop" class="cover-slides">
        <ul class="slides-container">
            <li class="text-center">
                <img src="images/slides/slide1.png" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20">Selamat Datang di <strong><br> Bengkel Las Wira Jaya</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to
                                see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="/shop">Pesan Sekarang</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/slides/slide2.png" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20">Selamat Datang di <strong><br> Bengkel Las Wira Jaya</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends
                                to
                                see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="/shop">Pesan Sekarang</a></p>
                        </div>
                    </div>
                </div>
            </li>
            <li class="text-center">
                <img src="images/slides/slide3.png" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20">Selamat Datang di <strong><br> Bengkel Las Wira Jaya</strong></h1>
                            <p class="m-b-40">See how your users experience your website in realtime or view <br> trends to
                                see any changes in performance over time.</p>
                            <p><a class="btn hvr-hover" href="/shop">Pesan Sekarang</a></p>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
        <div class="slides-navigation">
            <a href="#" class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
            <a href="#" class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
        </div>
    </div>
    <!-- End Slider -->

    {{-- <!-- Start Categories  -->
    <div class="categories-shop">
        <div class="container">
            <div class="title-all text-center mb-3">
                <h1><strong>Kategori</strong></h1>
            </div>
            <div class="row d-flex flex-row flex-wrap justify-content-center">
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/kategori/kg11.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Konstruksi Rumah</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/kategori/kg22.jpg" alt="" />
                        <a class="btn hvr-hover" href="#">Perabotan Rumah Tangga</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Categories --> --}}

    <!-- Start Products  -->
    <div class="products-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center">
                        <h1>Produk Las Terbaru</h1>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit amet lacus enim.</p>
                    </div>
                </div>
            </div>
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="special-menu text-center">
                        <div class="button-group filter-button-group">
                            <button class="active" data-filter="*">All</button>
                            <button data-filter=".top-featured">Top featured</button>
                            <button data-filter=".best-seller">Best seller</button>
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="row special-list">
                @foreach ($produk as $item)
                    <div class="col-lg-3 col-md-6 special-grid best-seller">
                        <div class="products-single fix">
                            <div class="box-img-hover">
                                <div class="type-lb">
                                </div>
                                <img src="{{ asset('gambar/' . $item->foto_produk) }}" class="img-fluid" alt="Image"
                                    style="width: 300px; height: 300px;">
                                <div class="mask-icon">
                                    <a class="cart" href="">Add to Cart</a>
                                </div>
                            </div>
                            <div class="why-text">
                                <h4>{{ $item->nama_produk }}</h4>
                                <h5>Rp {{ $item->harga_jasa }}</h5>
                            </div>
                        </div>

                    </div>
                @endforeach


                {{-- <div class="col-lg-3 col-md-6 special-grid top-featured">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="new">New</p>
                            </div>
                            <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i
                                                class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="Compare"><i
                                                class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right"
                                            title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="#">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Lorem ipsum dolor sit amet</h4>
                            <h5> $9.79</h5>
                        </div>
                    </div>
                </div> --}}

                {{-- <div class="col-lg-3 col-md-6 special-grid top-featured">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                            <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i
                                                class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right"
                                            title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right"
                                            title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="#">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Lorem ipsum dolor sit amet</h4>
                            <h5> $10.79</h5>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <div class="type-lb">
                                <p class="sale">Sale</p>
                            </div>
                            <img src="images/img-pro-04.jpg" class="img-fluid" alt="Image">
                            <div class="mask-icon">
                                <ul>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right" title="View"><i
                                                class="fas fa-eye"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right"
                                            title="Compare"><i class="fas fa-sync-alt"></i></a></li>
                                    <li><a href="#" data-toggle="tooltip" data-placement="right"
                                            title="Add to Wishlist"><i class="far fa-heart"></i></a></li>
                                </ul>
                                <a class="cart" href="#">Add to Cart</a>
                            </div>
                        </div>
                        <div class="why-text">
                            <h4>Lorem ipsum dolor sit amet</h4>
                            <h5> $15.79</h5>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        {{-- <div class="container d-felx align-item-center mx-auto w-100">
            {{ $produk->links() }}
        </div> --}}
    </div>

    <!-- End Products  -->

    <!-- Start Blog  -->
    <div class="latest-blog">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="title-all text-center mb-5">
                        <h1>Cara Memesan</h1>
                        <p>Berikut langkah-langkah dalam memesan produk las di Bengkel Las Wira Jaya.</p>
                    </div>
                </div>
            </div>
            <div class="order">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <i class="fas fa-box"></i>
                            <h3><strong>1. Pilih produk yang diinginkan</strong></h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <i class="fas fa-cart-plus"></i>
                            <h3><strong>2. Masukkan ke dalam keranjang</strong></h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <i class="fas fa-shopping-bag"></i>
                            <h3><strong>3. Silahkan melakukan checkout</strong></h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <i class="fas fa-pen"></i>
                            <h3><strong>4. Masukkan data diri serta ukuran yang diinginkan</strong></h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <i class="fas fa-file-invoice-dollar"></i>
                            <h3><strong>5. Lakukan pemesanan</strong></h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <i class="fas fa-money-bill"></i>
                            <h3><strong>6. Melakukan pembayaran</strong></h3>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <div class="text-center">
                            <i class="fas fa-shipping-fast"></i>
                            <h3><strong>7. Tunggu barang sampai ke lokasimu</strong></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Blog  -->
@endsection
