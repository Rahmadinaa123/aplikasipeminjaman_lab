@extends('layouts.laboran.app', [
    'title' => 'Edit Data Peminjaman Lab',
])

@section('konten')
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px">
                    <div class="card-body">
                        <a class="btn btn-outline-warning" href="{{ route('laboran.peminjaman_lab') }}">Kembali</a>
                        <h5 class="card-title text-center">Edit Data Peminjaman</h5>
                        <form action="/postEditPeminjamanLab/{{ $data->id }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Nama Peminjam (Read-only) -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nama Peminjam</label>
                                <input type="text" class="form-control border-secondary" name="username" readonly
                                    value="{{ $data->username }}">
                                <input type="hidden" name="id_user" value="{{ $data->id_user }}">
                                <span class="text-danger">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- NIM (Readonly) -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">NIM</label>
                                <input type="text" class="form-control border-secondary" name="nim" readonly
                                    value="{{ $data->nim }}">
                                <span class="text-danger">
                                    @error('nim')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Prodi (Readonly) -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Prodi</label>
                                <input type="text" class="form-control border-secondary" name="prodi" readonly
                                    value="{{ $data->prodi }}">
                                <span class="text-danger">
                                    @error('prodi')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Semester (Readonly) -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Semester</label>
                                <input type="" class="form-control border-secondary" name="semester" readonly
                                    value="{{ $data->semester }}">
                                <span class="text-danger">
                                    @error('semester')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Nama Lab -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nama Lab</label>
                                <select class="form-control border-secondary" name="nama_lab" required>
                                    <option value="Lab Software Development"
                                        {{ $data->nama_lab == 'Lab Software Development' ? 'selected' : '' }}>Lab Software
                                        Development</option>
                                    <option value="Lab Testing" {{ $data->nama_lab == 'Lab Testing' ? 'selected' : '' }}>
                                        Lab Testing</option>
                                    <option value="Lab Jaringan Komputer"
                                        {{ $data->nama_lab == 'Lab Jaringan Komputer' ? 'selected' : '' }}>Lab Jaringan
                                        Komputer</option>
                                    <option value="Lab Artificial Intelligence"
                                        {{ $data->nama_lab == 'Lab Artificial Intelligence' ? 'selected' : '' }}>Lab
                                        Artificial Intelligence</option>
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

                            <!-- Tanggal Mulai -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Tanggal Mulai</label>
                                <input type="date" class="form-control border-secondary" name="tanggal_mulai" required
                                    value="{{ old('tanggal_mulai', $data->tanggal_mulai) }}">
                                <span class="text-danger">
                                    @error('tanggal_mulai')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Tanggal Selesai -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Tanggal Selesai</label>
                                <input type="date" class="form-control border-secondary" name="tanggal_selesai" required
                                    value="{{ old('tanggal_selesai', $data->tanggal_selesai) }}">
                                <span class="text-danger">
                                    @error('tanggal_selesai')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Jam Mulai -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Jam Mulai</label>
                                <input type="time" class="form-control border-secondary" name="jam_mulai" required
                                    value="{{ old('jam_mulai', $data->jam_mulai) }}" >
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
                                    value="{{ old('jam_selesai', $data->jam_selesai) }}" >
                                <span class="text-danger">
                                    @error('jam_selesai')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Keperluan -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Keperluan</label>
                                <input type="text" class="form-control border-secondary" name="keperluan" required
                                    value="{{ old('keperluan', $data->keperluan) }}">
                                <span class="text-danger">
                                    @error('keperluan')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Status -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Status</label>
                                <select class="form-control border-secondary" name="status" required>
                                    <option value="pending" {{ $data->status == 'pending' ? 'selected' : '' }}>Pending
                                    </option>
                                    <option value="pinjam" {{ $data->status == 'pinjam' ? 'selected' : '' }}>Pinjam
                                    </option>
                                    <option value="selesai" {{ $data->status == 'selesai' ? 'selected' : '' }}>Selesai
                                    </option>
                                </select>
                                <span class="text-danger">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Button Submit -->
                            <button type="submit" class="btn btn-success mt-3">Update Data Peminjaman</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
