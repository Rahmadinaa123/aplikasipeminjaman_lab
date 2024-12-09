@extends('layouts.laboran.app', [
    'title' => 'Data Peminjaman inventaris Lab',
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
    <h3>Data Peminjaman Inventaris lab</h3>
    <br>
    <a class="btn btn-outline-success" href="{{ route('laboran.peminjaman_inventaris.tambah') }}">Tambah Data</a>
    <div>
        <table class="table table-bordered table-striped table-hover" style="margin-top: 10px">
            <thead class="table-primary">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Nim</th>
                    <th scope="col">Nama barang</th>
                    <th scope="col">Tanggal Peminjaman</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Status</th>
                    <th class="col-md-3" scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                <tr>
                    @php $no = 1; @endphp
                    @foreach ($data as $item)
                        <!-- menampilkan mahasiswa saja -->
                        @if ($item->nama_lab == Auth::user()->nama_lab)
                <tr>
                    <td class="">{{ $no++ }}</td> <!-- Nomor urut -->
                    <td>{{ $item->username }}</td> <!-- Nama peminjam -->
                    <td>{{ $item->nim }}</td> <!-- NIM peminjam -->
                    <td>{{ $item->nama_barang }}</td>
                    <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') }} -
                        {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y') }}</td>
                    <!-- Tanggal mulai -->
                    <td>{{ $item->keperluan }}</td> <!-- Keperluan -->
                    <td>{{ $item->status }}</td>
                    <td>
                        <a class="btn btn-outline-success" href="">Detail</a>
                        <a class="btn btn-outline-warning"
                            href="/laboran/peminjaman_inventaris/edit/{{ $item->id }}">Edit</a>
                        <a class="btn btn-outline-danger" href="/deleteUser/">Delete</a>
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
