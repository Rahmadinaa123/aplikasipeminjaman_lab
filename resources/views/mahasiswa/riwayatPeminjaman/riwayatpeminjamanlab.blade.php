@extends('layouts.mahasiswa.app', [
    'title' => 'Riwayat Peminjaman Inventaris',
    'contentTitle' => 'Dashboard',
])

@section('konten')
    <div>
        <h2 class="text-center">Riwayat Peminjaman Lab</h2>
        <br>
        <table class="table table-striped table-hover table-bordered" style="margin-top: 10px">
            <thead class="table-primary">
                <tr class="col-md-12">
                    <th scope="col">No</th>
                    <th scope="col">Nama Peminjam</th>
                    <th scope="col">NIM</th>
                    <th scope="col">Nama Lab</th>
                    <th scope="col-md-3">Tanggal Peminjaman</th>
                    <th scope="col">Jam Pemakaian</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @php $no = 1; @endphp
                @foreach ($data as $item)
                    @if ($item->id_user == Auth::user()->id)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->nim }}</td>
                            <td>{{ $item->nama_lab }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d-m-Y') }} -
                                {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} -
                                {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}</td>
                            <td>{{ $item->keperluan }}</td>

                            {{-- STATUS BERWARNA --}}
                            <td>
                                @php
                                    $badgeClass = match (strtolower($item->status)) {
                                        'pending' => 'badge bg-warning text-dark',
                                        'pinjam' => 'badge bg-success',
                                        'selesai' => 'badge bg-primary',
                                        'ditolak' => 'badge bg-danger',
                                        default => 'badge bg-secondary',
                                    };
                                @endphp
                                <span class="{{ $badgeClass }}">{{ ucfirst($item->status) }}</span>
                            </td>

                            <td>
                                @if ($item->status == 'pinjam')
                                    <a href="{{ route('mahasiswa.editSuratPeminjaman', $item->id) }}"
                                        class="btn btn-sm btn-success" target="_blank">Cetak</a>
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table><br>


    </div>
@endsection
