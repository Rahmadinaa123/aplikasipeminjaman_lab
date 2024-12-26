<style>
    .btn {
        padding: 10px 20px;
        border-radius: 10px;
        /* Membuat sudut tombol melengkung */
        font-weight: bold;
    }
</style>

@extends('layouts.mahasiswa.app', [
    'title' => 'Daftar Lab',
    'contentTitle' => 'Dashboard',
])

@section('konten')
    <div class="container">
        @if (Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Login Gagal!</strong> {{ Session::get('failed') }}
                <button type="button" class="btn-close" data-bs- dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Berhasil!</strong> {{ Session::get('success') }}
            </div>
        @endif
        <a style="margin-bottom: 20px" href="{{ route('cek.lab') }}" class="btn btn-warning">Cek Ketersediaan
            Lab</a>
        <br>
        <div class="row">

            <!-- Card untuk setiap lab, ditampilkan 4 per baris -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lab Testing</h5>
                        <p class="card-text">Lab Testing adalah fasilitas untuk menguji perangkat lunak atau sistem guna
                            memastikan kualitas.</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ url('mahasiswa/pinjamLab?lab=Lab Testing') }}" class="btn btn-primary">Pinjam
                                Lab</a>
                            <a href="{{ url('mahasiswa/pinjaminventaris?lab=Lab Testing') }}" class="btn btn-success">Pinjam
                                Inventaris</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lab Artificial Intelligence</h5>
                        <p class="card-text">Lab Artificial Intelligence adalah fasilitas untuk mempelajari dan
                            mengembangkan.</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ url('mahasiswa/pinjamLab?lab=Lab Artificial Intelligence') }}"
                                class="btn btn-primary">Pinjam Lab</a>
                            <a href="{{ url('mahasiswa/pinjaminventaris?lab=Lab Artificial Intelligence') }}"
                                class="btn btn-success">Pinjam
                                Inventaris</a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lab Jaringan Komputer</h5>
                        <p class="card-text">Lab Jaringan Komputer adalah fasilitas untuk mempelajari dan mengembangkan
                            peragkat lunak.</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ url('mahasiswa/pinjamLab?lab=Lab Jaringan Komputer') }}"
                                class="btn btn-primary">Pinjam
                                Lab</a>
                            <a href="{{ url('mahasiswa/pinjaminventaris?lab=Lab Jaringan Komputer') }}"
                                class="btn btn-success">Pinjam
                                Inventaris</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lab Pemrograman Lanjut</h5>
                        <p class="card-text">Lab Pemrograman Lanjut adalah fasilitas untuk mempelajari dan mengembangkan
                            aplikasi.</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ url('mahasiswa/pinjamLab?lab=Lab Pemrograman Lanjut') }}"
                                class="btn btn-primary">Pinjam
                                Lab</a>
                            <a href="{{ url('mahasiswa/pinjaminventaris?lab=Lab Pemrograman Lanjut') }}"
                                class="btn btn-success">Pinjam
                                Inventaris</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- cek -->
            <!-- Baris berikutnya -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lab Software Development</h5>
                        <p class="card-text">Lab Software Development adalah fasilitas untuk mengembangkan perangkat lunak.
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ url('mahasiswa/pinjamLab?lab=Lab Software Development') }}"
                                class="btn btn-primary">Pinjam Lab</a>
                            <a href="{{ url('mahasiswa/pinjaminventaris?lab=Lab Software Development') }}"
                                class="btn btn-success">Pinjam
                                Inventaris</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lab Multimedia</h5>
                        <p class="card-text">Lab Multimedia adalah fasilitas untuk mempelajari dan mengembangkan perangkat
                            lunak, dilengkapi dengan perangkat keras.</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ url('mahasiswa/pinjamLab?lab=Lab Multimedia') }}" class="btn btn-primary">Pinjam
                                Lab</a>
                            <a href="{{ url('mahasiswa/pinjaminventaris?lab=Lab Multimedia') }}"
                                class="btn btn-success">Pinjam
                                Inventaris</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lab Basis Data</h5>
                        <p class="card-text">Lab Basis Data adalah fasilitas untuk mempelajari dan mengembangkan sistem dan
                            implementasi teknologi basis data untuk kebutuhan .</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ url('mahasiswa/pinjamLab?lab=Lab Basis Data') }}" class="btn btn-primary">Pinjam
                                Lab</a>
                            <a href="{{ url('mahasiswa/pinjaminventaris?lab=Lab Basis Data') }}"
                                class="btn btn-success">Pinjam
                                Inventaris</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lab Sistem Informasi</h5>
                        <p class="card-text">Sistem Informasi adalah fasilitas untuk mengelola data dan informasi penting,
                            dan distribusi informasi secara efisien.
                        </p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ url('mahasiswa/pinjamLab?lab=Lab Sistem Informasi') }}"
                                class="btn btn-primary">Pinjam
                                Lab</a>
                            <a href="{{ url('mahasiswa/pinjaminventaris?lab=Lab Sistem Informasi') }}"
                                class="btn btn-success">Pinjam
                                Inventaris</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lab Internet Of Things</h5>
                        <p class="card-text">Lab Internet of Things ini fasilitas untuk mempelajari dan
                            mengembangkan teknologi IoT.</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ url('mahasiswa/pinjamLab?lab=Lab Internet Of Things') }}"
                                class="btn btn-primary">Pinjam
                                Lab</a>
                            <a href="{{ url('mahasiswa/pinjaminventaris?lab=Lab Internet Of Things') }}"
                                class="btn btn-success">Pinjam
                                Inventaris</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Lab Sistem Keamanan</h5>
                        <p class="card-text">Lab Sistem Keamanan menyediakan fasilitas untuk mempelajari keamanan
                            jaringan
                            dan data.</p>
                        <div class="d-flex justify-content-center gap-2">
                            <a href="{{ url('mahasiswa/pinjamLab?lab=Lab Sistem Keamanan') }}"
                                class="btn btn-primary">Pinjam
                                Lab</a>
                            <a href="{{ url('mahasiswa/pinjaminventaris?lab=Lab Sistem Keamanan') }}"
                                class="btn btn-success">Pinjam
                                Inventaris</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
    </div>
@endsection
