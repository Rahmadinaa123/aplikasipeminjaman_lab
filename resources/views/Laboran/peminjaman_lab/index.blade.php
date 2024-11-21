<style>
    table {
        width: 80%;
        border-collapse: collapse;
    }

    table th,
    table td {
        padding: 10px 15px;
        border-bottom: 1px solid #ddd;
        text-align: left;
    }

    table td:nth-child(1),
    table td:nth-child(5),
    table td:nth-child(7) {
        text-align: center;
    }

    table th:nth-child(1),
    table th:nth-child(3),
    table th:nth-child(6) {
        width: 100px;
    }

    table tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    .button-edit {
        margin-right: 10px;
        background-color: #f0ad4e;
        /* warna kuning */
        color: white;
    }

    .button-delete {
        background-color: red;
        color: white;
    }
</style>

@extends('layouts.laboran.app', [
    'title' => 'Data peminjaman_lab',
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
    <h3>Data Peminjaman {{ Auth::user()->nama_lab }}</h3>
    <br>
    <a class="btn btn-outline-success" href="{{ route('laboran.peminjaman_lab.tambah') }}">Tambah Data</a>

    <div>
        <table class="table" style="margin-top: 10px">
            <thead>
                <tr>
                <tr class="col-md-12">
                    <th class="" scope="col">No</th>
                    <th class="col-md-" scope="col">Nama Peminjam</th>
                    <th scope="col">NIM</th>
                    <th scope="col-md-3">Tanggal Peminjaman</th>
                    <th scope="col">Jam Pemakaian</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Status</th>
                    <th class="col-md-3" scope="col">Aksi</th>
                </tr>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @php $no = 1; @endphp
                @foreach ($data as $item)
                    <!-- menampilkan mahasiswa saja -->
                    @if ($item->nama_lab == Auth::user()->nama_lab)
                        <tr>
                            <td class="">{{ $no++ }}</td> <!-- Nomor urut -->
                            <td>{{ $item->username }}</td> <!-- Nama peminjam -->
                            <td>{{ $item->nim }}</td> <!-- NIM peminjam -->
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d-m-Y') }} -
                                {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y') }}</td>
                            <!-- Tanggal mulai -->
                            <td>{{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} -
                                {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}</td>
                            <!-- Jam pemakaian -->
                            <td>{{ $item->keperluan }}</td> <!-- Keperluan -->
                            <td>{{ $item->status }}</td>
                            <td>
                                <a class="btn btn-outline-success" href="/laboran/peminjaman_lab/detail/{{ $item->id }}">Detail</a>
                                <a class="btn btn-outline-warning" href="/editPeminjamanLab/{{ $item->id }}">Edit</a>
                                <a class="btn btn-outline-danger" href="/deletePeminjaman/{{ $item->id }}"
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
