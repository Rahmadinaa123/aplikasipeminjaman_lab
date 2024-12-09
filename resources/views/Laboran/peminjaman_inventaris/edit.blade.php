@extends('layouts.laboran.app', [
    'title' => 'Edit Data PeminjamanInventaris',
])
@section('konten')
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px">
                    <div class="card-body">
                        <a class="btn btn-outline-warning" href="{{ route('laboran.peminjaman_inventaris') }}">Kembali</a>
                        <h5 class="card-title text-center">Edit Data
                            User</h5>
                        <form action="/postEditpeminjaman_inventaris/{{ $data->id }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Username</label>
                                <input type="text" class="form-controlborder border-secondary form-control"
                                    name="username" required value="{{ $data->username }}" readonly>
                                <span class="text-danger">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nim</label>
                                <input type="text" class="form-controlborder border-secondary form-control"
                                    name="nim" required value="{{ $data->nim }}" readonly>
                                <span class="text-danger">
                                    @error('nim')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Prodi</label>
                                <input type="text" class="form-controlborder border-secondary form-control"
                                    name="prodi" required value="{{ $data->prodi }}" readonly>
                                <span class="text-danger">
                                    @error('prodi')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Semester</label>
                                <input type="text" class="form-controlborder border-secondary form-control"
                                    name="semester" required value="{{ $data->semester }}" readonly>
                                <span class="text-danger">
                                    @error('semester')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">No Hp</label>
                                <input type="text" class="form-controlborder border-secondary form-control"
                                    name="no_hp" required value="{{ $data->no_hp }}">
                                <span class="text-danger">
                                    @error('no_hp')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Email</label>
                                <input type="text" class="form-controlborder border-secondary form-control"
                                    name="email" required value="{{ $data->email }}">
                                <span class="text-danger">
                                    @error('email')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Nama Lab</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="nama_lab">
                                    <option value="None" {{ $data->nama_lab == 'None' ? 'selected' : '' }}>None
                                    </option>
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
                                    @error('level')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Level</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="level">
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

                            <button type="submit" class="btn btn-success mt-3">Upadate Data
                                User</button>
                        </form>
                    </div>
                </div>
            </div>
        </div><br><br><br><br>
    </div>
@endsection
