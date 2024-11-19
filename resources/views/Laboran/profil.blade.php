@extends('layouts.laboran.app', [
    'title' => 'Profil',
    'contentTitle' => 'Dashboard',
])

@section('konten')
    <div class="container mt-4">
        <div class="card shadow-sm p-3">
            <h3 class="text-center mb-3">Profil Admin</h3>

            <div class="row align-items-center py-1 border-bottom">
                <div class="col-md-4 text-end fw-semibold">Username:</div>
                <div class="col-md-8">{{ Auth::user()->username }}</div>
            </div>
            <div class="row align-items-center py-1 border-bottom">
                <div class="col-md-4 text-end fw-semibold">Prodi:</div>
                <div class="col-md-8">{{ Auth::user()->prodi }}</div>
            </div>
            <div class="row align-items-center py-1 border-bottom">
                <div class="col-md-4 text-end fw-semibold">No HP:</div>
                <div class="col-md-8">{{ Auth::user()->no_hp }}</div>
            </div>
            <div class="row align-items-center py-1 border-bottom">
                <div class="col-md-4 text-end fw-semibold">Email:</div>
                <div class="col-md-8">{{ Auth::user()->email }}</div>
            </div>
            <div class="row align-items-center py-1">
                <div class="col-md-4 text-end fw-semibold">Nama Lab:</div>
                <div class="col-md-8">{{ Auth::user()->nama_lab }}</div>
            </div>
        </div>
    </div>
@endsection
