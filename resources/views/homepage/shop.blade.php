@extends('layouts.index')
@section('title', 'Produk')
@section('content')
    <!-- Start Shop Page  -->
    <div class="shop-box-inner">
        <div class="container">
            <div class="row">
                <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                    <div class="right-product-box">
                        <div class="product-categorie-box">
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                    <div class="row">
                                        @foreach ($produk as $item)
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <img src="{{ asset('gambar/' . $item->foto_produk) }}"
                                                            class="img-fluid" alt="Image"
                                                            style="width: 300px; height: 300px;">
                                                        <div class="mask-icon">
                                                            <a class="cart" href="{{ url('/shop/' . $item->id) }}">Add to
                                                                Cart</a>
                                                        </div>
                                                    </div>
                                                    <div class="why-text">
                                                        <h4>{{ $item->nama_produk }}</h4>
                                                        <h5>Rp {{ $item->harga_jasa }}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach


                                        {{-- <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="new">New</p>
                                                    </div>
                                                    <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="View"><i
                                                                        class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Compare"><i
                                                                        class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Add to Wishlist"><i
                                                                        class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> $9.79</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="View"><i
                                                                        class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Compare"><i
                                                                        class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Add to Wishlist"><i
                                                                        class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> $9.79</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="new">New</p>
                                                    </div>
                                                    <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="View"><i
                                                                        class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Compare"><i
                                                                        class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Add to Wishlist"><i
                                                                        class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> $9.79</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="View"><i
                                                                        class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Compare"><i
                                                                        class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Add to Wishlist"><i
                                                                        class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> $9.79</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="View"><i
                                                                        class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Compare"><i
                                                                        class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Add to Wishlist"><i
                                                                        class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> $9.79</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="View"><i
                                                                        class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Compare"><i
                                                                        class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Add to Wishlist"><i
                                                                        class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> $9.79</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="View"><i
                                                                        class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Compare"><i
                                                                        class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Add to Wishlist"><i
                                                                        class="far fa-heart"></i></a></li>
                                                        </ul>
                                                        <a class="cart" href="#">Add to Cart</a>
                                                    </div>
                                                </div>
                                                <div class="why-text">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> $9.79</h5>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="new">New</p>
                                                    </div>
                                                    <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="View"><i
                                                                        class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Compare"><i
                                                                        class="fas fa-sync-alt"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip"
                                                                    data-placement="right" title="Add to Wishlist"><i
                                                                        class="far fa-heart"></i></a></li>
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

                                    </div>
                                </div>
                                {{-- <div role="tabpanel" class="tab-pane fade" id="list-view">
                                    <div class="list-view-box">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="new">New</p>
                                                        </div>
                                                        <img src="images/img-pro-01.jpg" class="img-fluid"
                                                            alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="#" data-toggle="tooltip"
                                                                        data-placement="right" title="View"><i
                                                                            class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip"
                                                                        data-placement="right" title="Compare"><i
                                                                            class="fas fa-sync-alt"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip"
                                                                        data-placement="right" title="Add to Wishlist"><i
                                                                            class="far fa-heart"></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> <del>$ 60.00</del> $40.79</h5>
                                                    <p>Integer tincidunt aliquet nibh vitae dictum. In turpis sapien,
                                                        imperdiet quis magna nec, iaculis ultrices ante. Integer vitae
                                                        suscipit nisi. Morbi dignissim risus sit amet orci porta, eget
                                                        aliquam purus
                                                        sollicitudin. Cras eu metus felis. Sed arcu arcu, sagittis in
                                                        blandit eu, imperdiet sit amet eros. Donec accumsan nisi purus, quis
                                                        euismod ex volutpat in. Vestibulum eleifend eros ac lobortis
                                                        aliquet.
                                                        Suspendisse at ipsum vel lacus vehicula blandit et sollicitudin
                                                        quam. Praesent vulputate semper libero pulvinar consequat. Etiam ut
                                                        placerat lectus.</p>
                                                    <a class="btn hvr-hover" href="#">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-view-box">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="sale">Sale</p>
                                                        </div>
                                                        <img src="images/img-pro-02.jpg" class="img-fluid"
                                                            alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="#" data-toggle="tooltip"
                                                                        data-placement="right" title="View"><i
                                                                            class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip"
                                                                        data-placement="right" title="Compare"><i
                                                                            class="fas fa-sync-alt"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip"
                                                                        data-placement="right" title="Add to Wishlist"><i
                                                                            class="far fa-heart"></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> <del>$ 60.00</del> $40.79</h5>
                                                    <p>Integer tincidunt aliquet nibh vitae dictum. In turpis sapien,
                                                        imperdiet quis magna nec, iaculis ultrices ante. Integer vitae
                                                        suscipit nisi. Morbi dignissim risus sit amet orci porta, eget
                                                        aliquam purus
                                                        sollicitudin. Cras eu metus felis. Sed arcu arcu, sagittis in
                                                        blandit eu, imperdiet sit amet eros. Donec accumsan nisi purus, quis
                                                        euismod ex volutpat in. Vestibulum eleifend eros ac lobortis
                                                        aliquet.
                                                        Suspendisse at ipsum vel lacus vehicula blandit et sollicitudin
                                                        quam. Praesent vulputate semper libero pulvinar consequat. Etiam ut
                                                        placerat lectus.</p>
                                                    <a class="btn hvr-hover" href="#">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="list-view-box">
                                        <div class="row">
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <div class="type-lb">
                                                            <p class="sale">Sale</p>
                                                        </div>
                                                        <img src="images/img-pro-03.jpg" class="img-fluid"
                                                            alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="#" data-toggle="tooltip"
                                                                        data-placement="right" title="View"><i
                                                                            class="fas fa-eye"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip"
                                                                        data-placement="right" title="Compare"><i
                                                                            class="fas fa-sync-alt"></i></a></li>
                                                                <li><a href="#" data-toggle="tooltip"
                                                                        data-placement="right" title="Add to Wishlist"><i
                                                                            class="far fa-heart"></i></a></li>
                                                            </ul>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                                <div class="why-text full-width">
                                                    <h4>Lorem ipsum dolor sit amet</h4>
                                                    <h5> <del>$ 60.00</del> $40.79</h5>
                                                    <p>Integer tincidunt aliquet nibh vitae dictum. In turpis sapien,
                                                        imperdiet quis magna nec, iaculis ultrices ante. Integer vitae
                                                        suscipit nisi. Morbi dignissim risus sit amet orci porta, eget
                                                        aliquam purus
                                                        sollicitudin. Cras eu metus felis. Sed arcu arcu, sagittis in
                                                        blandit eu, imperdiet sit amet eros. Donec accumsan nisi purus, quis
                                                        euismod ex volutpat in. Vestibulum eleifend eros ac lobortis
                                                        aliquet.
                                                        Suspendisse at ipsum vel lacus vehicula blandit et sollicitudin
                                                        quam. Praesent vulputate semper libero pulvinar consequat. Etiam ut
                                                        placerat lectus.</p>
                                                    <a class="btn hvr-hover" href="#">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>


                {{-- filter data --}}
                <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 mt-4 sidebar-shop-left">
                    <div class="product-categori">
                        <div class="search-product">
                            <form action="#">
                                <input class="form-control" placeholder="Search here..." type="text">
                                <button type="submit"> <i class="fa fa-search"></i> </button>
                            </form>
                        </div>
                        {{-- <div class="filter-sidebar-left">
                            <div class="title-left">
                                <h3>Categories</h3>
                            </div>
                            <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men"
                                data-children=".sub-men">
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men1"
                                        data-toggle="collapse" aria-expanded="true" aria-controls="sub-men1">Fruits &
                                        Drinks <small class="text-muted">(100)</small>
                                    </a>
                                    <div class="collapse show" id="sub-men1" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action active">Fruits
                                                1 <small class="text-muted">(50)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Fruits 2
                                                <small class="text-muted">(10)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Fruits 3
                                                <small class="text-muted">(10)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Fruits 4
                                                <small class="text-muted">(10)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Fruits 5
                                                <small class="text-muted">(20)</small></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-group-collapse sub-men">
                                    <a class="list-group-item list-group-item-action" href="#sub-men2"
                                        data-toggle="collapse" aria-expanded="false" aria-controls="sub-men2">Vegetables
                                        <small class="text-muted">(50)</small>
                                    </a>
                                    <div class="collapse" id="sub-men2" data-parent="#list-group-men">
                                        <div class="list-group">
                                            <a href="#" class="list-group-item list-group-item-action">Vegetables 1
                                                <small class="text-muted">(10)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Vegetables 2
                                                <small class="text-muted">(20)</small></a>
                                            <a href="#" class="list-group-item list-group-item-action">Vegetables 3
                                                <small class="text-muted">(20)</small></a>
                                        </div>
                                    </div>
                                </div>
                                <a href="#" class="list-group-item list-group-item-action"> Grocery <small
                                        class="text-muted">(150) </small></a>
                                <a href="#" class="list-group-item list-group-item-action"> Grocery <small
                                        class="text-muted">(11)</small></a>
                                <a href="#" class="list-group-item list-group-item-action"> Grocery <small
                                        class="text-muted">(22)</small></a>
                            </div>
                        </div> --}}
                        {{-- <div class="filter-price-left">
                            <div class="title-left">
                                <h3>Price</h3>
                            </div>
                            <div class="price-box-slider">
                                <div id="slider-range"></div>
                                <p>
                                    <input type="text" id="amount" readonly
                                        style="border:0; color:#fbb714; font-weight:bold;">
                                    <button class="btn hvr-hover" type="submit">Filter</button>
                                </p>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Shop Page -->
@endsection
