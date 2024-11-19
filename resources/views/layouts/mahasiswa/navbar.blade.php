<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:  #085bae">
    <div class="container-fluid">
        <a class="navbar-brand" href="/" class="logo d-flex align-items-center">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <img src="/assets/img/logo.png" alt="" width="180px">
            <span></span>
        </a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item ">
                    <a class="nav-link {{ Request::is('mahasiswa/home') ? 'active' : '' }}" aria-current="page"
                        href="{{ route('mahasiswa.home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('mahasiswa/jadwal') ? 'active' : '' }}"
                        href="{{ route('mahasiswa.jadwal') }}">Jadwal Laboratorium</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('mahasiswa/daftarLab') ? 'active' : '' }}"
                        href="{{ route('mahasiswa.daftarLab') }}">Daftar Lab</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Riwayat Peminjaman
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('mahasiswa.riwayatPeminjamanLab') }}">Riwayat
                                Peminjaman Lab</a></li>
                        <li><a class="dropdown-item" href="#">Riwayat Peminjaman Inventaris</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('mahasiswa/profil') ? 'active' : '' }}"
                        href="{{ route('mahasiswa.profil') }}">Profil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); confirmLogout();">Logout</a>
                </li>

                <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
                    @csrf
                </form>
            </ul>
        </div>
    </div>
</nav>
