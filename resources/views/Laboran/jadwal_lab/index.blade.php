@extends('layouts.laboran.app', [
    'title' => 'Data jadwal Lab',
])
@section('konten')
    @if (Session::get('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Login Gagal!</strong> {{ Session::get('failed') }}
            <button type="button" class="btn-close" data-bs- dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil!</strong> {{ Session::get('success') }}
        </div>
    @endif
    <h3>Data Jadwal Lab</h3>
    <br>
    <a class="btn btn-outline-success" href="{{ route('laboran.jadwal_lab.tambah') }}">Tambah Data</a>
    <a class="btn btn-primary" href="/laboran/JadwalLab/cetakjadwal">
        <i class="bi bi-printer"></i> Cetak
    </a>
    <div>
        @php
            $no = 1;
            // Urutan hari secara manual
            $orderHari = ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];

            // Urutkan berdasarkan hari dan jam_mulai
            $sortedData = $data->sortBy(function ($item) use ($orderHari) {
                return [array_search(strtolower($item->hari), $orderHari), $item->jam_mulai];
            });
        @endphp

        <table class="table table-bordered table-striped table-hover" style="margin-top: 10px">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Hari</th>
                    <th class="col-md-2" scope="col">Jam Mulai</th>
                    <th scope="col">Jam Selesai</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Prodi</th>
                    <th class="col-md-2" scope="col">Mata Kuliah</th>
                    <th class="col-md-2" scope="col">Dosen</th>
                    <th class="col-md-2" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($sortedData as $item)
                    @if ($item->nama_lab == Auth::user()->nama_lab)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ ucfirst($item->hari) }}</td>
                            <td>{{ $item->jam_mulai }}</td>
                            <td>{{ $item->jam_selesai }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->prodi }}</td>
                            <td>{{ $item->mata_kuliah }}</td>
                            <td>{{ $item->dosen }}</td>
                            <td>
                                <a class="btn btn-outline-warning"
                                    href="/laboran/jadwal_lab/editJadwalLab/{{ $item->id }}">Edit</a>
                                <a class="btn btn-outline-danger" href="/deleteJadwalLab/{{ $item->id }}"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table><br>



    </div>

    <!-- Content Row -->
    </div>
    </div>
@endsection
