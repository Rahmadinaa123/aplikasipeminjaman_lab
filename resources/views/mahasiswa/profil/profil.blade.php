@extends('layouts.mahasiswa.app', [
'title' => 'Profil Mahasiswa',
'contentTitle' => 'Dashboard',
])

@section('konten')
<div class="row">
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
    <div class="col-md-8 offset-md-2">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Profil Mahasiswa</h4>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-md-3">
                        <h5>Nama:</h5>
                    </div>
                    <div class="col-md-9">
                        <p>{{ Auth::user()->username }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <h5>NIM:</h5>
                    </div>
                    <div class="col-md-9">
                        <p>{{ Auth::user()->nim }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <h5>Program Studi:</h5>
                    </div>
                    <div class="col-md-9">
                        <p>{{ Auth::user()->prodi }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <h5>Semester/Kelas:</h5>
                    </div>
                    <div class="col-md-9">
                        <p>{{ Auth::user()->semester }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <h5>Email:</h5>
                    </div>
                    <div class="col-md-9">
                        <p>{{ Auth::user()->email }}</p>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-3">
                        <h5>No Hp:</h5>
                    </div>
                    <div class="col-md-9">
                        <p>{{ Auth::user()->no_hp }}</p>
                    </div>
                </div>

                <!-- Tombol Kembali ke Dashboard -->
                <a href="/mahasiswa/home" class="btn btn-secondary">Kembali ke Dashboard</a>
                <a href="{{ route('mahasiswa.profil.edit') }}" class="btn btn-primary">Edit Profil</a>
            </div>
        </div>
    </div>
</div>
@endsection