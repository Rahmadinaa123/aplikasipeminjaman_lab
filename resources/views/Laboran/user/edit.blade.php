@extends('layouts.laboran.app', [
    'title' => 'Edit Data User',
])

@section('konten')
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px;">
                    <div class="card-body">
                        <a class="btn btn-outline-warning" href="{{ route('laboran.user') }}">Kembali</a>
                        <h5 class="card-title text-center mt-3">Edit Data User</h5>

                        <form action="/postEditUser/{{ $data->id }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Username -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Username</label>
                                <input type="text" class="form-control border-secondary" name="username" required
                                    value="{{ $data->username }}">
                                <span class="text-danger">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- NIM -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">NIM</label>
                                <input type="text" class="form-control border-secondary" name="nim" required
                                    value="{{ $data->nim }}">
                                <span class="text-danger">
                                    @error('nim')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Prodi -->
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

                            <!-- Semester -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Semester</label>
                                <input type="text" class="form-control border-secondary" name="semester" required
                                    value="{{ $data->semester }}">
                                <span class="text-danger">
                                    @error('semester')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- No Hp -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">No Hp</label>
                                <input type="text" class="form-control border-secondary" name="no_hp" required
                                    value="{{ $data->no_hp }}">
                                <span class="text-danger">
                                    @error('no_hp')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Email -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Email</label>
                                <input type="text" class="form-control border-secondary" name="email" required
                                    value="{{ $data->email }}">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Nama Lab -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nama Lab</label>
                                <select class="form-control border-secondary" name="nama_lab" required>
                                    <option value="None" {{ $data->nama_lab == 'None' ? 'selected' : '' }}>None</option>
                                    <option value="Lab Software Development"
                                        {{ $data->nama_lab == 'Lab Software Development' ? 'selected' : '' }}>Lab Software
                                        Development</option>
                                    <option value="Lab Testing" {{ $data->nama_lab == 'Lab Testing' ? 'selected' : '' }}>
                                        Lab Testing</option>
                                    <option value="Lab Jaringan Komputer"
                                        {{ $data->nama_lab == 'Lab Jaringan Komputer' ? 'selected' : '' }}>Lab Jaringan
                                        Komputer</option>
                                    <option value="Lab Artificial Intelegence"
                                        {{ $data->nama_lab == 'Lab Artificial Intelegence' ? 'selected' : '' }}>Lab
                                        Artificial Intelegence</option>
                                    <option value="Lab Pemrograman"
                                        {{ $data->nama_lab == 'Lab Pemrograman' ? 'selected' : '' }}>Lab Pemrograman
                                    </option>
                                </select>
                                <span class="text-danger">
                                    @error('nama_lab')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Level -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Level</label>
                                <select class="form-control border-secondary" name="level" required>
                                    <option value="laboran" {{ $data->level == 'laboran' ? 'selected' : '' }}>Laboran
                                    </option>
                                    <option value="mahasiswa" {{ $data->level == 'mahasiswa' ? 'selected' : '' }}>Mahasiswa
                                    </option>
                                    <option value="ketua Laboran" {{ $data->level == 'ketua laboran' ? 'selected' : '' }}>
                                        Ketua Laboran</option>
                                </select>
                                <span class="text-danger">
                                    @error('level')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" class="btn btn-success mt-3">Update Data User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
