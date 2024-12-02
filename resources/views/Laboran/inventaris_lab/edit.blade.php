@extends('layouts.laboran.app', [
'title' => 'Edit Data Inventaris Lab',
])

@section('konten')
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px;">
                    <div class="card-body">
                        <a class="btn btn-outline-warning" href="{{ route('laboran.inventaris_lab') }}">Kembali</a>
                        <h5 class="card-title text-center mt-3">Edit Data Inventaris Lab</h5>

                        <form action="" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Nama Barang -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nama Barang</label>
                                <input type="text" class="form-control border-secondary" name="nama_barang" required
                                    value="{{ old('nama_barang', $inventaris->nama_barang) }}">
                                <span class="text-danger">
                                    @error('nama_barang')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Nama Lab -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nama Lab</label>
                                <input type="readonly" class="form-control border-secondary" name="nama_lab" readonly
                                    value="{{ $inventaris->nama_lab }}">
                                <span class="text-danger">
                                    @error('nama_lab')
                                    {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Kode Barang -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Kode Barang</label>
                                <input type="text" class="form-control border-secondary" name="kode_barang" required
                                    value="{{ old('kode_barang', $inventaris->kode_barang) }}">
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
                                    <option value="komputer" {{ $inventaris->kategori == 'komputer' ? 'selected' : '' }}>Komputer</option>
                                    <option value="perangkat input" {{ $inventaris->kategori == 'perangkat input' ? 'selected' : '' }}>Perangkat Input</option>
                                    <option value="perangkat output" {{ $inventaris->kategori == 'perangkat output' ? 'selected' : '' }}>Perangkat Output</option>
                                    <option value="jaringan" {{ $inventaris->kategori == 'jaringan' ? 'selected' : '' }}>Jaringan</option>
                                    <option value="perangkat listrik" {{ $inventaris->kategori == 'perangkat listrik' ? 'selected' : '' }}>Perangkat Listrik</option>
                                    <option value="aksesoris" {{ $inventaris->kategori == 'aksesoris' ? 'selected' : '' }}>Aksesoris</option>
                                    <option value="lainnya" {{ $inventaris->kategori == 'lainnya' ? 'selected' : '' }}>Lainnya</option>
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
                                <input type="number" class="form-control border-secondary" name="jumlah" required
                                    value="{{ old('jumlah', $inventaris->jumlah) }}">
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
                                    <option value="baik" {{ $inventaris->kondisi == 'baik' ? 'selected' : '' }}>Baik</option>
                                    <option value="rusak" {{ $inventaris->kondisi == 'rusak' ? 'selected' : '' }}>Rusak</option>
                                    <option value="kurang baik" {{ $inventaris->kondisi == 'kurang baik' ? 'selected' : '' }}>Kurang Baik</option>
                                    <option value="dalam perbaikan" {{ $inventaris->kondisi == 'dalam perbaikan' ? 'selected' : '' }}>Dalam Perbaikan</option>
                                    <option value="hilang" {{ $inventaris->kondisi == 'hilang' ? 'selected' : '' }}>Hilang</option>
                                </select>
                                <span class="text-danger">
                                    @error('kondisi')
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
        </div>
    </div>
@endsection
