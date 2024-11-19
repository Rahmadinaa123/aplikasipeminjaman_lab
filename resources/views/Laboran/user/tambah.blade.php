@extends('layouts.laboran.app', [
    'title' => 'Tambah Data User',
])
@section('konten')
    <div class="container">
        @if (Session::get('success'))
            <div class="alert alert-success alert-dismissible fadeshow" role="alert">
                <strong>Berhasil!</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs- dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (Session::get('failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Gagal!</strong> {{ Session::get('success') }}
                <button type="button" class="btn-close" data-bs- dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px">
                    <div class="card-body">
                        <a class="btn btn-outline-warning" href="{{ route('laboran.user') }}">Kembali</a>
                        <h5 class="card-title text-center">Tambah Data
                            User</h5>
                        <form action="{{ route('laboran.postUser') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Username</label>
                                <input type="text" class="form-controlborder border-secondary form-control"
                                    name="username" required value="{{ old('username') }}">
                                <span class="text-danger">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nim</label>
                                <input type="text" class="form-controlborder border-secondary form-control"
                                    name="nim" required value="{{ old('nim') }}">
                                <span class="text-danger">
                                    @error('nim')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Prodi</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="prodi">
                                    <option value="D3-Teknik Informatika">D3-Teknik Informatika</option>
                                    <option value="D4-Rekayasa Perangkat Lunak">D4-Rekayasa Perangkat Lunak</option>
                                    <option value="D4-Keamanan Sistem Informasi">D4-Keamanan Sistem Informasi</option>
                                    <option value="D2-Administrasi Jaringan Komputer">D4-Keamanan Sistem Informasi</option>
                                </select>
                                <span class="text-danger">
                                    @error('prodi')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Semester</label>
                                <input type="text" class="form-controlborder border-secondary form-control"
                                    name="semester" required value="{{ old('semester') }}">
                                <span class="text-danger">
                                    @error('semester')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">No Hp</label>
                                <input type="text" class="form-controlborder border-secondary form-control"
                                    name="no_hp" required value="{{ old('no_hp') }}">
                                <span class="text-danger">
                                    @error('no_hp')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Email</label>
                                <input type="text" class="form-controlborder border-secondary form-control"
                                    name="email" required value="{{ old('email') }}">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Password</label>
                                <input type="password" class="form-controlborder border-secondary form-control"
                                    name="password" required value="{{ old('password') }}">
                                <span class="text-danger">
                                    @error('password')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Nama Lab</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="nama_lab">
                                    <option value="None">None</option>
                                    <option value="Lab Software Development">Lab Software Development</option>
                                    <option value="Lab Testing">Lab Testing</option>
                                    <option value="Lab Jaringan Komputer">Lab Jaringan Komputer</option>
                                    <option value="Lab Artificial Intelegence">Lab Artificial Intelegence</option>
                                    <option value="Lab Pemrograman">Lab Pemrograman</option>
                                </select>
                                <span class="text-danger">
                                    @error('nama_lab')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Level</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="level">
                                    <option value="laboran">Laboran</option>
                                    <option value="mahasiswa">Mahasiswa</option>
                                    <option value="ketua laboran">Ketua Laboran</option>
                                </select>
                                <span class="text-danger">
                                    @error('level')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <input type="submit" value="tambah data" class="btn btn-success mt-3">
                        </form>
                    </div>
                </div>
            </div>
        </div><br><br><br><br>
    </div>
@endsection
