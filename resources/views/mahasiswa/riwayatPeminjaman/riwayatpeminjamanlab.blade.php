@extends('layouts.mahasiswa.app', [
    'title' => 'Riwayat Peminjaman Inventaris',
    'contentTitle' => 'Dashboard',
])

@section('konten')
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
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d-m-Y') }} -
                                {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y') }}</td>
                            <!-- Tanggal mulai -->
                            <td>{{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} -
                                {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}</td>
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
