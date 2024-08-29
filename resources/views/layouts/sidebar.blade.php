
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="glyphicon glyphicon-wrench"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Sinar Terang Motor</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
 <!--    <li class="nav-item">
        <a class="nav-link" href="{{ url('home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Halaman Utama</span></a>
    </li> -->
    @auth
    <!-- Nav Item - Dashboard -->
    @if (Auth::user()->role === "Admin")
    <li class="nav-item">
        <a class="nav-link" href="{{ url('dashboard') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    @endif


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    @if (Auth::user()->role === "Admin" || Auth::user()->role === "Kasir")
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
            aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Profile</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Profile : </h6>
                <a class="collapse-item" href="{{ url('profile/') }}">Profile</a>
                <a class="collapse-item" href="{{ url('profile/show/') }}">Ubah Profile</a>
            </div>
        </div>
    </li>
    @endif

    @if (Auth::user()->role === "Admin")
    <li class="nav-item">
        <a class="nav-link" href="{{ url('user') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Data Pengguna</span></a>
    </li>
    @endif




    <!-- Divider -->
    <hr class="sidebar-divider">
    @if (Auth::user()->role == "Admin" || Auth::user()->role == "Kasir")
    <!-- Heading -->
    <div class="sidebar-heading">
        Transaksi
    </div>


    <li class="nav-item">
                        <a class="nav-link" href="{{ url('master-pengeluaran') }}">

            <i class="fas fa-fw fa-credit-card"></i>
            <span>Pengeluaran</span></a>
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Transaksi</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Transaksi:</h6>
                <a class="collapse-item" href="{{ url('transaksi-pembelian-barang') }}">Daftar Transaksi <br> Pembelian
                    Barang</a>
                <a class="collapse-item" href="{{ url('transaksi-pembelian') }}">Total Akhir <br> Transaksi
                    Pembelian</a>

            </div>
        </div>
    </li>
    @endif

    <hr class="sidebar-divider">
    @if (Auth::user()->role == "Admin")
    <div class="sidebar-heading">
        Master
    </div>
    <li class="nav-item">
        <a class="nav-link" href="{{ url('master-kategori') }}">

            <i class="fas fa-fw fa-cube"></i>
            <span>Master Kategori</span></a>

        <a class="nav-link" href="{{ url('master-produk') }}">

            <i class="fas fa-fw fa-boxes"></i>
            <span>Master Produk</span></a>

            <a class="nav-link" href="{{ url('master-supplier') }}">

            <i class="fas fa-fw fa-truck"></i>
            <span>Master Supplier</span></a>
       
    </li>
    @endif


<!--     <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </li> -->
    @endauth

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar