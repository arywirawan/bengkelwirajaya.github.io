{{-- <!-- Start Main Top -->
<div class="main-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="custom-select-box">
                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="$ USD">
                        <option>¥ JPY</option>
                        <option>$ USD</option>
                        <option>€ EUR</option>
                    </select>
                </div>
                <div class="right-phone-box">
                    <p>Call US :- <a href="#"> +11 900 800 100</a></p>
                </div>
                <div class="our-link">
                    <ul>
                        <li><a href="#"><i class="fa fa-user s_color"></i> My Account</a></li>
                        <li><a href="#"><i class="fas fa-location-arrow"></i> Our location</a></li>
                        <li><a href="#"><i class="fas fa-headset"></i> Contact Us</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <div class="login-box">
                    <select id="basic" class="selectpicker show-tick form-control" data-placeholder="Sign In">
                        <option>Register Here</option>
                        <option>Sign In</option>
                    </select>
                </div>
                <div class="text-slid-box">
                    <div id="offer-box" class="carouselTicker">
                        <ul class="offer-box">
                            <li>
                                <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT80
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 50%! Shop Now
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 10%! Shop Vegetables
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 50% - 80% off on Vegetables
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> 20% off Entire Purchase Promo code: offT30
                            </li>
                            <li>
                                <i class="fab fa-opencart"></i> Off 50%! Shop Now
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Top --> --}}

<!-- Start Main Top -->
<header class="main-header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                    aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html"><img src="images/slides/logo.png" class="logo"
                        alt=""></a>
            </div>
            <!-- End Header Navigation -->

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">

                    <li class="nav-item @if ($menu == 'beranda') active @endif"><a class="nav-link"
                            href="/">Beranda</a></li>
                    <li class="nav-item @if ($menu == 'produk') active @endif"><a class="nav-link"
                            href="/shop">Produk</a></li>
                    <li class="nav-item"><a class="nav-link" href="#footer-main">Tentang Kami</a></li>
                    {{-- <li class="dropdown">
                        <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">Belanja</a>
                        <ul class="dropdown-menu">
                            <li><a href="shop.html">Sidebar Shop</a></li>
                            <li><a href="shop-detail.html">Shop Detail</a></li>
                            <li><a href="cart.html">Cart</a></li>
                            <li><a href="checkout.html">Checkout</a></li>
                            <li><a href="my-account.html">My Account</a></li>
                            <li><a href="wishlist.html">Wishlist</a></li>
                        </ul>
                    </li> --}}
                    @guest
                        <li class="nav-item"><a class="nav-link" href="\login">Login</a></li>
                    @endguest
                    @auth
                        <li class="dropdown">
                            <a href="#" class="nav-link dropdown-toggle arrow"
                                data-toggle="dropdown">{{ auth()->user()->name }}</a>
                            <form action="/logout" method="POST" id="submit" class="nav-link dropdown-toggle">
                                @csrf
                                <ul class="dropdown-menu">
                                    <li><a href="#">Profile</a></li>
                                    <li><a href="#">Keranjang</a></li>
                                    <li><a href="#">Pesanan</a></li>
                                    <li>
                                        <a href="#" onclick="myFunction()">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                            </form>
                        </li>

                    @endauth

                </ul>
            </div>
            <!-- /.navbar-collapse -->

            {{-- <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    <li class="side-menu">
                        <a href="#">
                            <i class="fa fa-shopping-bag"></i>
                            <span class="badge">3</span>
                            <p>My Cart</p>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Atribute Navigation --> --}}
        </div>
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Main Top -->

{{-- <!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        </div>
    </div>
</div>
<!-- End Top Search --> --}}

<script>
    function myFunction() {
        document.getElementById("submit").submit();
    }
</script>