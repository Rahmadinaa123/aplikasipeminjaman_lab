@extends('layouts.mahasiswa.app', [
    'title' => 'Profil Mahasiswa',
    'contentTitle' => 'Dashboard',
])

@section('konten')
    <div class="row">
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
                            <h5>Semester:</h5>
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

                    <!-- Tombol Kembali ke Dashboard -->
                    <a href="/mahasiswa/home" class="btn btn-secondary">Kembali ke Dashboard</a>
                    <a href="{{ route('mahasiswa.profil.edit') }}" class="btn btn-primary">Edit Profil</a>
                </div>
            </div>
        </div>
    </div>
@endsection
