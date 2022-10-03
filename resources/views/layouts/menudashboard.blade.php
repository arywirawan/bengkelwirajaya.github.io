<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{ url('admin/') }}" class="nav-link">
                <i class="nav-icon fas fa-th"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-folder-open"></i>
                <p>
                    Produk
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('produk.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Produk</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-shopping-cart"></i>
                <p>
                    Pesanan
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('pesanan.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Pesanan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pembayaran.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Pembayaran</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
                <i class="nav-icon fas fa-folder"></i>
                <p>
                    Data
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('customer.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Pelanggan</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('bahan.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Bahan Baku</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('detilbahan.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Detail Produk</p>
                    </a>
                </li>
            </ul>
        </li>
        <li class="nav-item">
            <a href="{{ URL::to('admin/profil') }}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                    Profil
                </p>
            </a>
        </li>
        {{-- <li class="nav-item">
            <form action="/logout" method="POST" id="submit">
                <a href="#" class="nav-link">
                    @csrf
                    <i class="nav-icon fas fa-sign-out-alt"></i>

                    <a href="#" onclick="myFunction()">
                        Logout
                    </a>
                </a>
            </form>
        </li> --}}
    </ul>
</nav>
