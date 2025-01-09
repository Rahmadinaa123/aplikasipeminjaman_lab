@extends('layouts.mahasiswa.app', [
    'title' => 'Riwayat Peminjaman Inventaris',
    'contentTitle' => 'Dashboard',
])

@section('konten')
    <div>
        <h2 class="text-center">Riwayat Peminjaman Inventaris Lab</h2>
        <br>
        <table class="table table table-striped table-hover table-bordered" style="margin-top: 10px">
            <thead class="table-primary">
                <tr>
                <tr class="col-md-12">
                    <th class="" scope="col">No</th>
                    <th class="col-md-" scope="col">Nama Peminjam</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Nama Lab</th>
                    <th scope="col-md-3">Tanggal Peminjaman</th>
                    <th scope="col">Jam Pemakaian</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Status</th>
                </tr>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @php $no = 1; @endphp
                @foreach ($data as $item)
                    <!-- menampilkan mahasiswa saja -->
                    @if ($item->id_user == Auth::user()->id)
                        <tr>
                            <td class="">{{ $no++ }}</td> <!-- Nomor urut -->
                            <td>{{ $item->username }}</td> <!-- Nama peminjam -->
                            <td>{{ $item->nim }}</td> <!-- NIM peminjam -->
                            <td>{{ $item->nama_barang }}</td>
                            <td>{{ $item->nama_lab }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_pinjam)->format('d-m-Y') }} -
                                {{ \Carbon\Carbon::parse($item->tanggal_kembali)->format('d-m-Y') }}</td>
                            <!-- Tanggal mulai -->
                            <td>{{ \Carbon\Carbon::parse($item->jam_pinjam)->format('H:i') }} -
                                {{ \Carbon\Carbon::parse($item->jam_kembali)->format('H:i') }}</td>
                            <!-- Jam pemakaian -->
                            <td>{{ $item->keperluan }}</td> <!-- Keperluan -->
                            <td>{{ $item->status }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>

        </table><br>

    </div>
@endsection
