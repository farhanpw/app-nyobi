<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- <i class="fas fa-laugh-wink"></i> --}}
        </div>
        <div class="sidebar-brand-text mx-3">Administrator</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Data Master</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                {{-- <a class="collapse-item" href="/kategori">Data Kategori</a> --}}
                <a class="collapse-item" href="/sizes">Data Ukuran</a>
                <a class="collapse-item" href="/variants">Data Rasa</a>
                <a class="collapse-item" href="/slider">Data Slider</a>
                <a class="collapse-item" href="/barang">Data Produk</a>
                <a class="collapse-item" href="/testimoni">Data Testimoni</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pesanan" aria-expanded="true"
            aria-controls="pesanan">
            <i class="fas fa-fw fa-shopping-cart"></i>
            <span>Data Pesanan</span>
        </a>
        <div id="pesanan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="/pesanan/baru">Pesanan Baru</a>
                <a class="collapse-item" href="/pesanan/dikonfirmasi">Pesanan Dikonfirmasi</a>
                <a class="collapse-item" href="/pesanan/dikemas">Pesanan Dikemas</a>
                <a class="collapse-item" href="/pesanan/dikirim">Pesanan Dikirim</a>
                <a class="collapse-item" href="/pesanan/diterima">Pesanan Diterima</a>
                <a class="collapse-item" href="/pesanan/selesai">Pesanan Selesai</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/payment">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Pembayaran</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/laporan">
            <i class="fas fa-fw fa-book"></i>
            <span>Laporan Pesanan</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/tentang">
            <i class="fas fa-fw fa-globe"></i>
            <span>Tentang</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="/logout">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span></a>
    </li>
</ul>
<!-- End of Sidebar -->


{{-- <header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Administrator</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
        data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">

            <form action="/logout" method="post">
                @csrf
                <button type="submit" class="nav-link px-3 bg-dark border-0">
                    Logout <span data-feather="log-out"></span>
                </button>
            </form>
        </div>
    </div>
</header> --}}