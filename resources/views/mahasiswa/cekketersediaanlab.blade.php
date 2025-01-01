@extends('layouts.mahasiswa.app', [
    'title' => 'Cek Ketersediaan Lab',
    'contentTitle' => 'Dashboard',
])

@section('konten')
    <div class="container">
        <h1>Periksa Ketersediaan Lab</h1>
        <form action="{{ route('labs.checkAvailability') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tanggal_mulai">Tanggal Mulai</label>
                <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jam_mulai">Jam Mulai</label>
                <input type="time" id="jam_mulai" name="jam_mulai" class="form-control" required>
            </div>
            <div class="d-flex">
                <button type="submit" class="btn btn-primary mt-3 me-2">Cek Ketersediaan</button>
                <a href="/mahasiswa/daftarLab" class="btn btn-warning mt-3">Kembali</a>
            </div>

        </form>
    </div>
@endsection
