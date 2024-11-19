@extends('layouts.mahasiswa.app', [
    'title' => 'riwayat Mahasiswa',
    'contentTitle' => 'Dashboard',
])

@section('konten')
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Selamat Datang, {{ Auth::user()->username }}!</h1>
            <p class="text-center">Ini adalah dashboard Anda untuk mengakses berbagai informasi akademik.</p>

            <!-- Card Section -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Jadwal Laboratorium</h5>
                            <p class="card-text">Lihat Daftar dan Jadwal laboratorium yang Tersedia.</p>
                            <a href="#" class="btn btn-primary">Lihat Jadwal</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Riwayat Peminjaman Lab</h5>
                            <p class="card-text">Akses dan kelola laboratorium yang anda pinjam.</p>
                            <a href="#" class="btn btn-primary">Lihat Riwayat</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Riwayat Peminajaman Inventaris</h5>
                            <p class="card-text">Akses dan kelola inventaris yang anda pinjam.</p>
                            <a href="#" class="btn btn-primary">Lihat Riwayat Inventaris</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
