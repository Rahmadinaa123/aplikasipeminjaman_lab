@extends('layouts.mahasiswa.app', [
    'title' => 'Pinjam Lab',
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
        <h1>Peminjaman Lab</h1>
        <form action="{{ route('mahasiswa.postPeminjamanLab') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="labName" class="form-label">Nama Lab</label>
                <input type="text" class="form-control" id="labName" name="nama_lab" value="{{ $labName }}"
                    readonly>
            </div>
            <!-- Nama Peminjam -->
            <div class="mb-3">
                <label for="namaPeminjam" class="form-label">Nama Peminjam</label>
                <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}" required>
            </div>

            <div class="mb-3">
                <label for="nim" class="form-label">Nim</label>
                <input type="text" class="form-control" id="nim" name="nim" value="{{ Auth::user()->nim }}"
                    required>
            </div>

            <input readonly name="id_user" type="hidden" value="{{ Auth::user()->id }}" required>

            <!-- Prodi -->
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label>
                <input name="prodi" value="{{ Auth::user()->prodi }}" type="text" class="form-control"
                    id="semesterJurusan" required>
            </div>

            <!-- Semester-->
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <input value="{{ Auth::user()->semester }}" name="semester" type="number" class="form-control"
                    id="semesterJurusan" required>
            </div>

            <!-- Tanggal Peminjaman -->
            <div class="row mb-3">
                <div class="col">
                    <label for="tanggalDari" class="form-label">Tanggal Peminjaman Dari</label>
                    <input name="tanggal_mulai" type="date" class="form-control" id="tanggalDari" required>
                </div>
                <div class="col">
                    <label for="tanggalSampai" class="form-label">Sampai</label>
                    <input name="tanggal_selesai" type="date" class="form-control" id="tanggalSampai" required>
                </div>
            </div>

            <!-- Jam Pemakaian -->
            <div class="row mb-3">
                <div class="col">
                    <label for="jamMulai" class="form-label">Jam Pemakaian Mulai</label>
                    <input name="jam_mulai" type="time" class="form-control" id="jamMulai" required>
                </div>
                <div class="col">
                    <label for="jamSelesai" class="form-label">Selesai</label>
                    <input name="jam_selesai" type="time" class="form-control" id="jamSelesai" required>
                </div>
            </div>

            <!-- Keperluan -->
            <div class="mb-3">
                <label for="keperluan" class="form-label">Keperluan</label>
                <input name="keperluan" type="text" class="form-control" id="keperluan"
                    placeholder="contoh: Mengerjakan Tugas Akhir" required>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-end">
                <input type="submit" value="Pinjam" class="btn btn-success me-2">
                <a href="/mahasiswa/daftarLab" type="button" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>


    </div>
    </div>
@endsection
