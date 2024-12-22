@extends('layouts.mahasiswa.app', [
    'title' => 'Pinjam Lab',
    'contentTitle' => 'Dashboard',
])

@section('konten')
    @if (session('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Modal Peringatan -->
    <div class="modal fade" id="modalKetersediaanLab" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title" id="modalLabel">Peringatan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="modalMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <!-- Menampilkan pesan error jika ada -->
        @if (session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif
        <h1>Peminjaman Lab</h1>
        <form action="{{ route('mahasiswa.postPeminjamanLab') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="labName" class="form-label">Nama Lab</label>
                <input type="text" class="form-control" id="labName" name="nama_lab" value="{{ $labName }}"
                    readonly>
            </div>
            <!-- Nama Peminjam -->
            <div class="mb-3">
                <label for="namaPeminjam" class="form-label">Nama Peminjam</label>
                <input type="text" class="form-control" name="username" value="{{ Auth::user()->username }}" required>
            </div>

            <div class="mb-3">
                <label for="nim" class="form-label">Nim</label>
                <input type="text" class="form-control" id="nim" name="nim" value="{{ Auth::user()->nim }}"
                    required>
            </div>

            <input readonly name="id_user" type="hidden" value="{{ Auth::user()->id }}" required>

            <!-- Prodi -->
            <div class="mb-3">
                <label for="prodi" class="form-label">Prodi</label>
                <input name="prodi" value="{{ Auth::user()->prodi }}" type="text" class="form-control"
                    id="semesterJurusan" required>
            </div>

            <!-- Semester-->
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <input value="{{ Auth::user()->semester }}" name="semester" type="number" class="form-control"
                    id="semesterJurusan" required>
            </div>

            <!-- Tanggal Peminjaman -->
            <div class="row mb-3">
                <div class="col">
                    <label for="tanggalDari" class="form-label">Tanggal Peminjaman Dari</label>
                    <input name="tanggal_mulai" type="date" class="form-control" id="tanggalDari" required>
                </div>
                <div class="col">
                    <label for="tanggalSampai" class="form-label">Sampai</label>
                    <input name="tanggal_selesai" type="date" class="form-control" id="tanggalSampai" required>
                </div>
            </div>

            <!-- Jam Pemakaian -->
            <div class="row mb-3">
                <div class="col">
                    <label for="jamMulai" class="form-label">Jam Pemakaian Mulai</label>
                    <input name="jam_mulai" type="time" class="form-control" id="jamMulai" required>
                </div>
                <div class="col">
                    <label for="jamSelesai" class="form-label">Selesai</label>
                    <input name="jam_selesai" type="time" class="form-control" id="jamSelesai" required>
                </div>
            </div>

            <!-- Keperluan -->
            <div class="mb-3">
                <label for="keperluan" class="form-label">Keperluan</label>
                <input name="keperluan" type="text" class="form-control" id="keperluan"
                    placeholder="contoh: Mengerjakan Tugas Akhir" required>
            </div>

            <!-- Buttons -->
            <div class="d-flex justify-content-end">
                <input type="submit" value="Pinjam" class="btn btn-success me-2">
                <a href="/mahasiswa/daftarLab" type="button" class="btn btn-warning">Kembali</a>
            </div>
        </form>
    </div>


    </div>
    </div>

    <!-- Display pesan error -->
    <div id="ketersediaanLab" class="text-danger"></div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#jamMulai, #jamSelesai, #tanggalDari').on('change', function() {
                const namaLab = $('input[name="nama_lab"]').val();
                const tanggalMulai = $('input[name="tanggal_mulai"]').val();
                const jamMulai = $('#jamMulai').val();
                const jamSelesai = $('#jamSelesai').val();

                if (tanggalMulai && jamMulai && jamSelesai) {
                    $.ajax({
                        url: '{{ route('cek.ketersediaan.lab') }}',
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            nama_lab: namaLab,
                            tanggal_mulai: tanggalMulai,
                            jam_mulai: jamMulai,
                            jam_selesai: jamSelesai
                        },
                        success: function(response) {
                            if (!response.available) {
                                // Tampilkan modal jika lab sudah dipinjam
                                $('#modalMessage').text(response.message);
                                $('#modalKetersediaanLab').modal('show');
                            }
                        },
                        error: function() {
                            // Tampilkan modal jika ada kesalahan
                            $('#modalMessage').text('Terjadi kesalahan. Silakan coba lagi.');
                            $('#modalKetersediaanLab').modal('show');
                        }
                    });
                }
            });
        });
    </script>
@endsection
