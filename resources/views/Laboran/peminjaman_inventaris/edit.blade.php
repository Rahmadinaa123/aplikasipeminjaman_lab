@extends('layouts.laboran.app', [
    'title' => 'Edit Data PeminjamanInventaris',
])
@section('konten')
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px">
                    <div class="card-body">
                        <a class="btn btn-outline-warning"
                            href="/postEditPeminjaman/iventaris{{ $peminjaman->id }}">Kembali</a>
                        <h5 class="card-title text-center">Edit Data
                            User</h5>
                        <form action="/postEditPeminjaman/{{ $peminjaman->id }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Username -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Username</label>
                                <input type="text" class="form-control border-secondary" name="username" readonly
                                    value="{{ $peminjaman->username }}">
                                <span class="text-danger">
                                    @error('username')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- NIM -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">NIM</label>
                                <input type="text" class="form-control border-secondary" name="nim" readonly
                                    value="{{ $peminjaman->nim }}">
                                <span class="text-danger">
                                    @error('nim')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Prodi -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Prodi</label>
                                <input type="text" class="form-control border-secondary" name="prodi" readonly
                                    value="{{ $peminjaman->prodi }}">
                                <span class="text-danger">
                                    @error('prodi')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Nama Barang -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nama Barang</label>
                                <input type="text" class="form-control border-secondary" name="nama_barang" required
                                    value="{{ old('nama_barang', $peminjaman->nama_barang) }}">
                                <span class="text-danger">
                                    @error('nama_barang')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Nama Lab -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nama Lab</label>
                                <input type="text" class="form-control border-secondary" name="nama_lab" readonly
                                    value="{{ $peminjaman->nama_lab }}">
                                <span class="text-danger">
                                    @error('nama_lab')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Tanggal Pinjam -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Tanggal Pinjam</label>
                                <input type="date" class="form-control border-secondary" name="tanggal_pinjam" required
                                    value="{{ old('tanggal_pinjam', $peminjaman->tanggal_pinjam) }}">
                                <span class="text-danger">
                                    @error('tanggal_pinjam')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Tanggal Kembali -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Tanggal Kembali</label>
                                <input type="date" class="form-control border-secondary" name="tanggal_kembali"
                                    value="{{ old('tanggal_kembali', $peminjaman->tanggal_kembali) }}">
                                <span class="text-danger">
                                    @error('tanggal_kembali')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Jam Pinjam -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Jam Pinjam</label>
                                <input type="time" class="form-control border-secondary" name="jam_pinjam" required
                                    value="{{ old('jam_pinjam', $peminjaman->jam_pinjam) }}">
                                <span class="text-danger">
                                    @error('jam_pinjam')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Jam Kembali -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Jam Kembali</label>
                                <input type="time" class="form-control border-secondary" name="jam_kembali"
                                    value="{{ old('jam_kembali', $peminjaman->jam_kembali) }}">
                                <span class="text-danger">
                                    @error('jam_kembali')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Keperluan -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Keperluan</label>
                                <textarea class="form-control border-secondary" name="keperluan" required>{{ old('keperluan', $peminjaman->keperluan) }}</textarea>
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
                                    <option value="pending" {{ $peminjaman->status == 'pending' ? 'selected' : '' }}>
                                        Pending</option>
                                    <option value="ditolak" {{ $peminjaman->status == 'ditolak' ? 'selected' : '' }}>
                                        Ditolak</option>
                                    <option value="pinjam" {{ $peminjaman->status == 'pinjam' ? 'selected' : '' }}>Pinjam
                                    </option>
                                    <option value="selesai" {{ $peminjaman->status == 'selesai' ? 'selected' : '' }}>
                                        Selesai</option>
                                </select>
                                <span class="text-danger">
                                    @error('status')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Button Submit -->
                            <input type="submit" value="Update Data" class="btn btn-success mt-3">
                        </form>


                    </div>
                </div>
            </div>
        </div><br><br><br><br>
    </div>
@endsection
