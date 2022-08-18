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
                <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ asset('images/slides/logo.png') }}"
                        class="logo" alt=""></a>
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
                    @guest
                        <li class="nav-item"><a class="nav-link" href="\login">Login</a></li>
                    @endguest
                    @auth
                        <li class="dropdown @if ($menu == 'user') active @endif">
                            <a href="{{ url('#') }}" class="nav-link dropdown-toggle arrow"
                                data-toggle="dropdown">{{ auth()->user()->name }}</a>
                            <form action="/logout" method="POST" id="submit" class="nav-link dropdown-toggle">
                                @csrf
                                <ul class="dropdown-menu">
                                    <li><a href="{{ url('/profil') }}">Profil Saya</a></li>
                                    <li><a href="{{ url('/shop/cart/1') }}">Keranjang</a></li>
                                    <li><a href="{{ url('/listpesanan') }}">Pesanan</a></li>
                                    <li><a href="{{ url('/listpembayaran') }}">Pembayaran</a></li>
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
        </div>
    </nav>
    <!-- End Navigation -->
</header>
<!-- End Main Top -->

<script>
    function myFunction() {
        document.getElementById("submit").submit();
    }
</script>
