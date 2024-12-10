@extends('layouts.mahasiswa.app', [
    'title' => 'Pinjam Inventaris Lab',
    'contentTitle' => 'Dashboard',
])

@section('konten')
    <div class="container">
        <!-- Menampilkan pesan error jika ada -->
        @if (session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
        <h1>Peminjaman Inventaris Lab</h1>
        <form action="{{ route('mahasiswa.postPeminjamanInventarisLab') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <!-- Nama Lab -->
            <div class="mb-3">
                <label for="nama_lab" class="form-label">Nama Lab</label>
                <input type="text" class="form-control" id="nama_lab" name="nama_lab" value="{{ $labName }}"
                    readonly>
            </div>

            <!-- Nama Peminjam -->
            <div class="mb-3">
                <label for="username" class="form-label">Nama Peminjam</label>
                <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}" required>
            </div>

            <!-- NIM -->
            <div class="mb-3">
                <label for="nim" class="form-label">NIM</label>
                <input type="text" class="form-control" id="nim" name="nim" value="{{ Auth::user()->nim }}"
                    required>
            </div>

            <!-- Prodi -->
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label>
                <input name="prodi" type="text" class="form-control" id="prodi" value="{{ Auth::user()->prodi }}"
                    required>
            </div>

            <!-- Semester -->
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <input name="semester" type="number" class="form-control" id="semester"
                    value="{{ Auth::user()->semester }}" required>
            </div>

            <!-- Nama Barang -->
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <select name="nama_barang" id="nama_barang" class="form-control" required>
                    <option value="" disabled selected>Pilih Nama Barang</option>
                    @foreach ($inventaris as $barang)
                        <option value="{{ $barang->nama_barang }}">{{ $barang->nama_barang }}</option>
                    @endforeach
                </select>
            </div>


            <!-- Tanggal Peminjaman -->
            <div class="row mb-3">
                <div class="col">
                    <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                    <input name="tanggal_pinjam" type="date" class="form-control" id="tanggal_pinjam" required>
                </div>
                <div class="col">
                    <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                    <input name="tanggal_kembali" type="date" class="form-control" id="tanggal_kembali" required>
                </div>
            </div>

            <!-- Jam Pemakaian -->
            <div class="row mb-3">
                <div class="col">
                    <label for="jam_pinjam" class="form-label">Jam Pinjam</label>
                    <input name="jam_pinjam" type="time" class="form-control" id="jam_pinjam" required>
                </div>
                <div class="col">
                    <label for="jam_kembali" class="form-label">Jam Kembali</label>
                    <input name="jam_kembali" type="time" class="form-control" id="jam_kembali" required>
                </div>
            </div>

            <!-- Keperluan -->
            <div class="mb-3">
                <label for="keperluan" class="form-label">Keperluan</label>
                <input name="keperluan" type="text" class="form-control" id="keperluan"
                    placeholder="Contoh: Mengerjakan Tugas Akhir" required>
            </div>

            <!-- ID User -->
            <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">

            <!-- Buttons -->
            <div class="d-flex justify-content-end">
                <input type="submit" value="Pinjam" class="btn btn-success me-2">
                <a href="/mahasiswa/daftarLab" type="button" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>
@endsection
