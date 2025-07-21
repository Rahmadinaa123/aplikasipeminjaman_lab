<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center bg-white" href="index.html">
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
    <li class="nav-item {{ Request::is('kalab/home') ? 'active' : '' }}">
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

    <li class="nav-item {{ Request::is('kalab/jadwal_lab') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kalab.jadwal_lab') }}">
            <i class="fas fa-fw fa-archive"></i>
            <span>Data Jadwal</span>
        </a>
    </li>
    </li>

    <li class="nav-item {{ Request::is('kalab/inventaris_lab') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kalab.inventaris_lab') }}">
            <i class="fas fa-fw fa-book-open"></i>
            <span>Data Inventaris</span>
        </a>

    </li>

    <!-- Nav Item - Data Peminjaman -->
    <li class="nav-item {{ Request::is('kalab/peminjaman_lab') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kalab.peminjaman_lab') }}">
            <i class="fas fa-fw fa-book-open"></i>
            <span>Data Peminjaman Lab</span>
        </a>

    </li>

    <li class="nav-item {{ Request::is('kalab/peminjaman_inventaris') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kalab.peminjaman_inventaris') }}">
            <i class="fas fa-fw fa-book-open"></i>
            <span>Data Peminjaman Inventaris</span>
        </a>
    </li>

    <!-- Nav Item - Data Laporan Akhir -->
    <li class="nav-item">
        <a class="nav-link dropdown-toggle" href="#" id="laporanDropdown" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            <i class="fas fa-fw fa-file-alt"></i>
            <span>Data Laporan Akhir</span>
        </a>
        <ul class="dropdown-menu" aria-labelledby="laporanDropdown">
            <li>
                <a class="dropdown-item {{ Request::is('kalab/laporan_akhir/lab') ? 'active' : '' }}"
                    href="{{ route('kalab.laporan_akhir') }}">
                    Laporan Peminjaman Lab
                </a>
            </li>
            <li>
                <a class="dropdown-item {{ Request::is('laboran/laporan_akhir/lab') ? 'active' : '' }}"
                    href="{{ route('kalab.laporan_akhir_inventaris') }}">
                    Laporan Peminjaman Inventaris Lab
                </a>
            </li>
        </ul>
    </li>

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="/logout" data-toggle="modal" data-target="#logoutModal">
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
