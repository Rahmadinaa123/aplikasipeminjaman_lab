@extends('layouts.laboran.app', [
    'title' => 'Dashboard Laboran',
    'contentTitle' => 'Dashboard',
])

@section('konten')
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('laboran.user') }}"
                                class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                User</a>
                            <h4>{{ number_format($user) }}</h4>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('laboran.peminjaman_inventaris') }}"
                                class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Data Peminjaman Lab</a>
                            <h4>{{ number_format($peminjaman) }}</h4>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Produk Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('laboran.peminjaman_inventaris') }}"
                                class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Data Peminjaman Inventaris Lab</a>
                            <h4>{{ number_format($peminjamanInventarisLab) }}</h4>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <a href="{{ route('laboran.peminjaman_inventaris') }}"
                                class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Data Laporan Akhir</a>
                            <h4>{{ number_format($laporan) }}</h4>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
