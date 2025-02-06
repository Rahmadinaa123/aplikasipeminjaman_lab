@extends('layouts.kalab.app', [
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
<div>
    <table class="table table-bordered table-striped table-hover" style="margin-top: 10px">
        <thead class="table-primary">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Hari</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Jam Mulai</th>
                <th scope="col">Jam Selesai</th>
                <th scope="col">Kelas</th>
                <th scope="col">Prodi</th>
                <th scope="col">Mata Kuliah</th>
                <th scope="col">Dosen</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @php $no = 1; @endphp
            @foreach ($data as $item)
            <!-- menampilkan mahasiswa saja -->
            @if ($item->nama_lab == Auth::user()->nama_lab)
            <tr>
                <td class="">{{ $no++ }}</td>
                <td>{{ $item->hari }}</td>
                <td>{{ $item->tanggal }}</td>
                <td>{{ $item->jam_mulai }}</td>
                <td>{{ $item->jam_selesai }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->prodi }}</td>
                <td>{{ $item->mata_kuliah }}</td>
                <td>{{ $item->dosen }}</td>
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