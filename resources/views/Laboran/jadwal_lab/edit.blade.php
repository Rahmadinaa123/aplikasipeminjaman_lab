@extends('layouts.laboran.app', [
'title' => 'Edit Data Jadwal Lab',
])

@section('konten')
<div class="container">
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="card mt-4" style="width: 800px">
                <div class="card-body">
                    <a class="btn btn-outline-warning" href="{{ route('laboran.jadwal_lab') }}">Kembali</a>
                    <h5 class="card-title text-center">Edit Data Peminjaman</h5>
                    <form action="" method="POST"
                        enctype="multipart/form-data">
                        @csrf

                        <!-- Hari -->
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Hari</label>
                            <input type="text" class="form-control border-secondary" name="hari" required
                                value="{{ old('hari', $data->hari) }}">
                            <span class="text-danger">
                                @error('hari')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <!-- Jam Mulai -->
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Jam Mulai</label>
                            <input type="time" class="form-control border-secondary" name="jam_mulai" required
                                value="{{ old('jam_mulai', $data->jam_mulai) }}">
                            <span class="text-danger">
                                @error('jam_mulai')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <!-- Jam Selesai -->
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Jam Selesai</label>
                            <input type="time" class="form-control border-secondary" name="jam_selesai" required
                                value="{{ old('jam_selesai', $data->jam_selesai) }}">
                            <span class="text-danger">
                                @error('jam_selesai')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <!-- Kelas -->
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Kelas</label>
                            <input type="text" class="form-control border-secondary" name="kelas" required
                                value="{{ old('kelas', $data->kelas) }}">
                            <span class="text-danger">
                                @error('kelas')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <!-- Program Studi (Prodi) -->
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Prodi</label>
                            <select class="form-control border-secondary" name="prodi" required>
                                <option value="D3-Teknik Informatika"
                                    {{ $data->prodi == 'D3-Teknik Informatika' ? 'selected' : '' }}>D3-Teknik
                                    Informatika</option>
                                <option value="D4-Rekayasa Perangkat Lunak"
                                    {{ $data->prodi == 'D4-Rekayasa Perangkat Lunak' ? 'selected' : '' }}>D4-Rekayasa
                                    Perangkat Lunak</option>
                                <option value="D4-Keamanan Sistem Informasi"
                                    {{ $data->prodi == 'D4-Keamanan Sistem Informasi' ? 'selected' : '' }}>D4-Keamanan
                                    Sistem Informasi</option>
                                <option value="D2-Administrasi Jaringan Komputer"
                                    {{ $data->prodi == 'D2-Administrasi Jaringan Komputer' ? 'selected' : '' }}>
                                    D2-Administrasi Jaringan Komputer</option>
                            </select>
                            <span class="text-danger">
                                @error('prodi')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <!-- Nama Lab -->
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Nama Lab</label>
                            <select class="form-control border-secondary" name="nama_lab" required>
                                @foreach (['Lab Software Development', 'Lab Testing', 'Lab Jaringan Komputer', 'Lab
                                Artificial Intelligence', 'Lab Pemrograman'] as $lab)
                                <option value="{{ $lab }}" {{ $data->nama_lab == $lab ? 'selected' : '' }}>{{ $lab }}
                                </option>
                                @endforeach
                            </select>
                            <span class="text-danger">
                                @error('nama_lab')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <!-- Mata Kuliah -->
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Mata Kuliah</label>
                            <input type="text" class="form-control border-secondary" name="mata_kuliah" required
                                value="{{ old('mata_kuliah', $data->mata_kuliah) }}">
                            <span class="text-danger">
                                @error('mata_kuliah')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <!-- Dosen -->
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Dosen</label>
                            <input type="text" class="form-control border-secondary" name="dosen" required
                                value="{{ old('dosen', $data->dosen) }}">
                            <span class="text-danger">
                                @error('dosen')
                                {{ $message }}
                                @enderror
                            </span>
                        </div>

                        <!-- Button Submit -->
                        <button type="submit" class="btn btn-success mt-3">Update Jadwal</button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection