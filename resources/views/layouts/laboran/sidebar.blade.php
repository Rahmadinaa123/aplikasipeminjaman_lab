<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center bg-white" href="index.html">
        <div class="logo">
            <img src="/assets/img/logo.png" alt="Logo">
        </div>

    </a>
    <div class="profile">
        <img src="/assets/img/icon-user.png" alt="Profile Picture" class="profile-icon">
        <div class="profile-info">
            <div>Welcome,</div>
            <a href="/laboran/profil" class="profile-name">{{ Auth::user()->username }}</a>
        </div>
    </div>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('laboran/home') ? 'active' : '' }}">
        <a class="nav-link " href="{{ route('laboran.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item {{ Request::is('laboran/user') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laboran.user') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span></a>
    </li>
    <li class="nav-item {{ Request::is('laboran/peminjaman_lab') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laboran.peminjaman_lab') }}">
            <i class="fas fa-fw fa-book-open"></i> <!-- Ikon untuk Peminjaman -->
            <span>Data Peminjaman Lab</span>
        </a>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{ Request::is('laboran/inventaris_lab') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laboran.inventaris_lab') }}">
            <i class="fas fa-fw fa-clipboard-list"></i> <!-- Ikon untuk Inventaris -->
            <span>Data Inventaris Lab</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('laboran/peminjaman_inventaris') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laboran.peminjaman_inventaris') }}">
            <i class="fas fa-fw fa-archive"></i> <!-- Ikon untuk Inventaris -->
            <span>Data Peminjaman Inventaris</span>
        </a>
    </li>
    <li class="nav-item {{ Request::is('laboran/jadwal_lab') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('laboran.jadwal_lab') }}">
            <i class="fas fa-fw fa-calendar-alt"></i> <!-- Ikon untuk Jadwal -->
            <span>Data Jadwal Lab</span>
        </a>
    </li>
    <li class="nav-item dropdown {{ Request::is('laboran/laporan_akhir*') ? 'active' : '' }}">
        <a class="nav-link dropdown-toggle" href="#" id="laporanDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fas fa-fw fa-file-alt"></i> <!-- Ikon untuk Laporan -->
            <span>Data Laporan Akhir</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="laporanDropdown">
            <!-- Laporan Akhir Peminjaman Lab -->
            <li>
                <a class="dropdown-item {{ Request::is('laboran/laporan_akhir/lab') ? 'active' : '' }}"
                    href="{{ route('laboran.laporan_akhir') }}">
                    Laporan Peminjaman Lab
                </a>
            </li>
            <!-- Laporan Akhir Peminjaman Inventaris -->
            <li>
                <a class="dropdown-item {{ Request::is('laboran/laporan_akhir/inventaris') ? 'active' : '' }}"
                    href="{{ route('laboran.laporan_akhir.invetaris') }}">
                    Laporan Peminjaman Inventaris
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item {{ Request::is('laboran/jadwal_lab') ? 'active' : '' }}">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            Logout
        </a>
    </li>



    <!-- Nav Item - Utilities Collapse Menu -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->