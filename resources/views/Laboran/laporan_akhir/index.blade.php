@extends('layouts.laboran.app', [
    'title' => 'Data laporan akhir',
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
    <h3>Data Laporan Peminjaman Lab</h3>
    <br>
    <a class="btn btn-outline-warning" href="/editUser/">Cetak</a>
    <div>
        <table class="table table-bordered table-striped table-hover" style="margin-top: 10px">
            <thead class="table-primary">
                <tr>
                <tr class="col-md-12">
                    <th class="" scope="col">No</th>
                    <th class="" scope="col">Nama Peminjam</th>
                    <th scope="col">NIM</th>
                    <th scope="col-md-3">Tanggal Peminjaman</th>
                    <th scope="col-md-3">Jam Pemakaian</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Status</th>
                    <th class="col-md-2" scope="col">Aksi</th>
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
                                <a class="btn btn-outline-success" href="/editUser/">Detail</a>
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
