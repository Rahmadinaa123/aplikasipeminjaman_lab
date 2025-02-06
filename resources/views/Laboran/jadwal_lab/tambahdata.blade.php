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

                    <form action="{{ route('laboran.postjadwal_lab') }}" method="POST">
                        @csrf

                        <!-- Hari -->
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Hari</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="hari">
                                <option value="">Pilih hari</option>
                                <option value="senin" {{ old('hari') == 'senin' ? 'selected' : '' }}>senin</option>
                                <option value="selasa" {{ old('hari') == 'selasa' ? 'selected' : '' }}>selasa</option>
                                <option value="rabu" {{ old('hari') == 'rabu' ? 'selected' : '' }}>rabu</option>
                                <option value="kamis" {{ old('hari') == 'kamis' ? 'selected' : '' }}>kamis</option>
                                <option value="jumat" {{ old('hari') == 'jumat' ? 'selected' : '' }}>jumat</option>
                                <option value="sabtu" {{ old('hari') == 'sabtu' ? 'selected' : '' }}>sabtu</option>
                                <option value="minggu" {{ old('hari') == 'minggu' ? 'selected' : '' }}>minggu</option>
                            </select>
                            @error('hari')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Jam Mulai -->
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Tanggal</label>
                            <input type="date" class="form-control border-secondary" name="tanggal"
                                value="{{ old('tanggal') }}" required>
                            @error('tanggal')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Jam Mulai -->
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Jam Mulai</label>
                            <input type="time" class="form-control border-secondary" name="jam_mulai"
                                value="{{ old('jam_mulai') }}" required>
                            @error('jam_mulai')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Jam Selesai -->
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Jam Selesai</label>
                            <input type="time" class="form-control border-secondary" name="jam_selesai"
                                value="{{ old('jam_selesai') }}" required>
                            @error('jam_selesai')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Kelas -->
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Kelas</label>
                            <input type="text" class="form-control border-secondary" name="kelas"
                                value="{{ old('kelas') }}" required>
                            @error('kelas')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Program Studi (Prodi) -->
                        <div class="form-group mt-1">
                            <label class="text-secondary mb-2">Prodi</label>
                            <select class="form-control" id="exampleFormControlSelect1" name="prodi">
                                <option value="D3-Teknik Informatika"
                                    {{ old('prodi') == 'D3-Teknik Informatika' ? 'selected' : '' }}>D3-Teknik
                                    Informatika</option>
                                <option value="D4-Rekayasa Perangkat Lunak"
                                    {{ old('prodi') == 'D4-Rekayasa Perangkat Lunak' ? 'selected' : '' }}>D4-Rekayasa
                                    Perangkat Lunak</option>
                                <option value="D4-Keamanan Sistem Informasi"
                                    {{ old('prodi') == 'D4-Keamanan Sistem Informasi' ? 'selected' : '' }}>D4-Keamanan
                                    Sistem Informasi</option>
                                <option value="D2-Administrasi Jaringan Komputer"
                                    {{ old('prodi') == 'D2-Administrasi Jaringan Komputer' ? 'selected' : '' }}>
                                    D2-Administrasi Jaringan Komputer</option>
                            </select>
                            @error('prodi')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Nama Lab -->
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Nama Lab</label>
                            <input type="text" class="form-control border-secondary" name="nama_lab" readonly
                                value="{{ Auth::user()->nama_lab }}">
                            @error('nama_lab')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Mata Kuliah -->
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Mata Kuliah</label>
                            <input type="text" class="form-control border-secondary" name="mata_kuliah"
                                value="{{ old('mata_kuliah') }}" required>
                            @error('mata_kuliah')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Dosen -->
                        <div class="form-group mt-4">
                            <label class="text-secondary mb-2">Dosen</label>
                            <input type="text" class="form-control border-secondary" name="dosen"
                                value="{{ old('dosen') }}" required>
                            @error('dosen')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
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