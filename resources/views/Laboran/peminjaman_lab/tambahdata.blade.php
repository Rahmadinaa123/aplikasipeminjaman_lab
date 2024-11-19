@extends('layouts.laboran.app', [
    'title' => 'Tambah Data Peminjaman',
])

@section('konten')
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-center">
                <div class="card mt-4" style="width: 800px;">
                    <div class="card-body">
                        <a class="btn btn-outline-warning" href="{{ route('laboran.peminjaman_lab') }}">Kembali</a>
                        <h5 class="card-title text-center mt-3">Tambah Data Peminjaman</h5>

                        <form action="{{ route('laboran.postpeminjamanLab') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Nama Peminjam (Dropdown) -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nama Peminjam</label>
                                <select name="username" id="nama_peminjam" class="form-control border-secondary" required>
                                    <option value="">Pilih Nama Peminjam</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->username }}" data-nim="{{ $user->nim }}"
                                            data-prodi="{{ $user->prodi }}" data-semester="{{ $user->semester }}"
                                            data-id="{{ $user->id }}"> <!-- Menambahkan data-id -->
                                            {{ $user->username }}</option>
                                    @endforeach
                                </select>
                                <input type="hidden" name="id_user" id="id_user" value="{{ old('id_user') }}">
                                <!-- hidden input untuk id_user -->
                                <span class="text-danger">
                                    @error('id_user')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- NIM (Readonly) -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">NIM</label>
                                <input type="text" class="form-control border-secondary" name="nim" id="nim"
                                    readonly value="{{ old('nim') }}">
                                <span class="text-danger">
                                    @error('nim')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Prodi (Readonly) -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Prodi</label>
                                <input type="text" class="form-control border-secondary" name="prodi" id="prodi"
                                    readonly value="{{ old('prodi') }}">
                                <span class="text-danger">
                                    @error('prodi')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Semester (Readonly) -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Semester</label>
                                <input type="number" class="form-control border-secondary" name="semester" id="semester"
                                    readonly value="{{ old('semester') }}">
                                <span class="text-danger">
                                    @error('semester')
                                        {{ $message }}
                                    @enderror
                                </span>
                            </div>

                            <!-- Nama Lab -->
                            <!-- Nama Lab -->
                            <div class="form-group mt-4">
                                <label class="text-secondary mb-2">Nama Lab</label>
                                <input type="text" class="form-control border-secondary" name="nama_lab" id="semester"
                                    readonly value="{{ Auth::user()->nama_lab }}">
                                <span class="text-danger">
                                    @error('nama_lab')
                                        {{ $message }}
                                    @enderror
                                </span>
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
                                    value="{{ old('tanggal_mulai') }}">
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
                                    value="{{ old('tanggal_selesai') }}">
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
                                    value="{{ old('jam_mulai') }}">
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
                                    value="{{ old('jam_selesai') }}">
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
                                    value="{{ old('keperluan') }}">
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
                                    <option value="pending">Pending</option>
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

    <script>
        // Mengatur nilai id_user, nim, prodi, dan semester berdasarkan pilihan nama peminjam
        document.getElementById('nama_peminjam').addEventListener('change', function() {
            var selectedUserId = this.value;
            var selectedNim = this.options[this.selectedIndex].getAttribute('data-nim');
            var selectedProdi = this.options[this.selectedIndex].getAttribute('data-prodi');
            var selectedSemester = this.options[this.selectedIndex].getAttribute('data-semester');
            var selectedId = this.options[this.selectedIndex].getAttribute('data-id'); // Menyimpan id_user

            document.getElementById('id_user').value = selectedId; // Isi id_user
            document.getElementById('nim').value = selectedNim;
            document.getElementById('prodi').value = selectedProdi;
            document.getElementById('semester').value = selectedSemester;
        });
    </script>
@endsection
