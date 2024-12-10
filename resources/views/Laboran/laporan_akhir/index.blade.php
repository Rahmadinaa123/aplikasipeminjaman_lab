@extends('layouts.laboran.app', [
    'title' => 'Data Laporan Akhir',
])
@section('konten')
    @if (Session::has('failed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Gagal:</strong> {{ Session::get('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil:</strong> {{ Session::get('success') }}
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center">
        <h3>Data Laporan Peminjaman Lab</h3>
        <a class="btn btn-primary" href="/editUser/">
            <i class="bi bi-printer"></i> Cetak
        </a>
    </div>
    <br>

    <div>
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Tanggal</th>
                    <th>Jam</th>
                    <th>Keperluan</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($data as $item)
                    @if ($item->nama_lab == Auth::user()->nama_lab)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $item->username }}</td>
                            <td>{{ $item->nim }}</td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d-m-Y') }} -
                                {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y') }}
                            </td>
                            <td>
                                {{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} -
                                {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}
                            </td>
                            <td>{{ $item->keperluan }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a class="btn btn-info btn-sm" href="/laboran/laporan_akhir/detail/{{ $item->id }}"><i
                                        class="bi bi-eye"></i> Detail</a>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
