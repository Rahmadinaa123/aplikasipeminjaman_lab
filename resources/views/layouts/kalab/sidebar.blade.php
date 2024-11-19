<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="logo">
            <img src="/assets/img/logo.png" alt="Logo">
        </div>
    </a>

    <!-- Profile Section -->
    <div class="profile text-center py-3">
        <img src="/assets/img/icon-user.png" alt="Profile Picture" class="profile-icon rounded-circle mb-2">
        <div class="profile-info">
            <div>Welcome,</div>
            <a href="/kalab/profil" class="profile-name text-white">{{ Auth::user()->username }}</a>
        </div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ Request::is('Kalab/index') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kalab.home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - User -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span>
        </a>
    </li>

    <!-- Nav Item - Data Peminjaman Inventaris -->
    <li class="nav-item">
        <a class="nav-link" href="">
            <i class="fas fa-fw fa-archive"></i>
            <span>Data Jadwal</span>
        </a>
    </li>
    </li>

    <!-- Nav Item - Data Peminjaman Lab -->
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-fw fa-book-open"></i>
            <span>Data Inventaris Lab</span>
        </a>

        <!-- Nav Item - Data Laporan Akhir -->
    <li class="nav-item">
        <a class="nav-link dropdown-toggle" href="#" id="laporanDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Data Laporan Akhir</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="laporanDropdown">
            <li>
                <a class="dropdown-item {{ Request::is('laboran/laporan_akhir/lab') ? 'active' : '' }}"
                    href="{{ route('laboran.laporan_akhir') }}">
                    Laporan Peminjaman Lab
                </a>
            </li>
        </ul>
    </li>

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
            <span>Logout</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->
