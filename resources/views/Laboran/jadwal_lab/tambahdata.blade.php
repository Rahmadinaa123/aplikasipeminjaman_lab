@extends('layouts.laboran.app', [
    'title' => 'Tambah Data Jadwal Lab',
])

@section('konten')
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px;">
                    <div class="card-body">
                        <a class="btn btn-outline-warning" href="{{ route('laboran.jadwal_lab') }}">Kembali</a>
                        <h5 class="card-title text-center mt-3">Tambah Data Jadwal Lab</h5>

                        <form action="" method="POST">
                            @csrf

                            <!-- Hari -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Hari</label>
                                <input type="text" class="form-control border-secondary" name="hari" required>
                                <span class="text-danger">
                                    @error('hari')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Jam Mulai -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Jam Mulai</label>
                                <input type="time" class="form-control border-secondary" name="jam_mulai" required>
                                <span class="text-danger">
                                    @error('jam_mulai')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Jam Selesai -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Jam Selesai</label>
                                <input type="time" class="form-control border-secondary" name="jam_selesai" required>
                                <span class="text-danger">
                                    @error('jam_selesai')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Kelas -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Kelas</label>
                                <input type="text" class="form-control border-secondary" name="kelas" required>
                                <span class="text-danger">
                                    @error('kelas')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Program Studi (Prodi) -->
                            <div class="form-group mt-1">
                                <label class="text-secondary mb-2">Prodi</label>
                                <select class="form-control" id="exampleFormControlSelect1" name="prodi">
                                    <option value="D3-Teknik Informatika">D3-Teknik Informatika</option>
                                    <option value="D4-Rekayasa Perangkat Lunak">D4-Rekayasa Perangkat Lunak</option>
                                    <option value="D4-Keamanan Sistem Informasi">D4-Keamanan Sistem Informasi</option>
                                    <option value="D2-Administrasi Jaringan Komputer">D2-Administrasi Jaringan Komputer</option>
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
                                <input type="text" class="form-control border-secondary" name="nama_lab" readonly
                                    value="{{ Auth::user()->nama_lab }}">
                                <span class="text-danger">
                                    @error('nama_lab')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Mata Kuliah -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Mata Kuliah</label>
                                <input type="text" class="form-control border-secondary" name="mata_kuliah" required>
                                <span class="text-danger">
                                    @error('mata_kuliah')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Dosen -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Dosen</label>
                                <input type="text" class="form-control border-secondary" name="dosen" required>
                                <span class="text-danger">
                                    @error('dosen')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Button Submit -->
                            <input type="submit" value="Tambah Data" class="btn btn-success mt-3">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
