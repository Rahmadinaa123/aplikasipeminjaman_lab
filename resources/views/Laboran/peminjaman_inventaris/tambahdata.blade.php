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

                        <form action="" method="POST" enctype="multipart/form-data">
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

                            <!-- Kode Barang -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Kode Barang</label>
                                <input type="text" class="form-control border-secondary" name="kode_barang" required>
                                <span class="text-danger">
                                    @error('kode_barang')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Kategori -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Kategori</label>
                                <select class="form-control border-secondary" name="kategori" required>
                                    <option value="">Pilih Kategori</option>
                                    <option value="komputer">Komputer</option>
                                    <option value="perangkat input">Perangkat Input</option>
                                    <option value="perangkat output">Perangkat Output</option>
                                    <option value="jaringan">Jaringan</option>
                                    <option value="perangkat listrik">Perangkat Listrik</option>
                                    <option value="aksesoris">Aksesoris</option>
                                    <option value="lainnya">Lainnya</option>
                                </select>
                                <span class="text-danger">
                                    @error('kategori')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>



                            <!-- Jumlah -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Jumlah</label>
                                <input type="number" class="form-control border-secondary" name="jumlah" required>
                                <span class="text-danger">
                                    @error('jumlah')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Kondisi -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Kondisi</label>
                                <select class="form-control border-secondary" name="kondisi" required>
                                    <option value="baik">Baik</option>
                                    <option value="rusak">Rusak</option>
                                    <option value="kurang baik">Kurang Baik</option>
                                    <option value="dalam perbaikan">Dalam Perbaikan</option>
                                    <option value="hilang">Hilang</option>
                                </select>

                                <span class="text-danger">
                                    @error('kondisi')
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
