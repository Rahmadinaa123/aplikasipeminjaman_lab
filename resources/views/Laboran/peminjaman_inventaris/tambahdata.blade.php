@extends('layouts.laboran.app', [
    'title' => 'Tambah Data Inventaris Lab',
])

@section('konten')
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px;">
                    <div class="card-body">
                        <a class="btn btn-outline-warning" href="{{ route('laboran.peminjaman_lab') }}">Kembali</a>
                        <h5 class="card-title text-center mt-3">Tambah Data Inventaris Lab</h5>

                        <form action="{{ route('laboran.postpeminjaman_inventaris') }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <!-- Nama Barang -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nama Barang</label>
                                <input type="text" class="form-control border-secondary" name="nama_barang" required>
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
                                    value="{{ Auth::user()->nama_lab }}">
                                <span class="text-danger">
                                    @error('nama_lab')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Tanggal Pinjam -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Tanggal Pinjam</label>
                                <input type="date" class="form-control border-secondary" name="tanggal_pinjam" required>
                                <span class="text-danger">
                                    @error('tanggal_pinjam')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Tanggal Kembali -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Tanggal Kembali</label>
                                <input type="date" class="form-control border-secondary" name="tanggal_kembali">
                                <span class="text-danger">
                                    @error('tanggal_kembali')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Jam Pinjam -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Jam Pinjam</label>
                                <input type="time" class="form-control border-secondary" name="jam_pinjam" required>
                                <span class="text-danger">
                                    @error('jam_pinjam')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Jam Kembali -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Jam Kembali</label>
                                <input type="time" class="form-control border-secondary" name="jam_kembali">
                                <span class="text-danger">
                                    @error('jam_kembali')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Keperluan -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Keperluan</label>
                                <textarea class="form-control border-secondary" name="keperluan" required></textarea>
                                <span class="text-danger">
                                    @error('keperluan')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Status</label>
                                <select class="form-control border-secondary" name="status" required>
                                    <option value="pending">Pending</option>
                                    <option value="ditolak">Ditolak</option>
                                    <option value="pinjam">Pinjam</option>
                                    <option value="selesai">Selesai</option>
                                </select>
                                <span class="text-danger">
                                    @error('status')
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
