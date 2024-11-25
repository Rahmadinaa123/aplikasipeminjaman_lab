@extends('layouts.laboran.app', [
'title' => 'Data User',
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
<h3>Data User</h3>
<br>
<a class="btn btn-outline-success" href="{{ route('laboran.user.tambah') }}">Tambah Data</a>
<div>
    <table class="table table-bordered table-striped table-hover" style="margin-top: 10px">
        <thead class="table-primary">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Username</th>
                <th scope="col">NIM</th>
                <th scope="col">Prodi</th>
                <th scope="col">Semester</th>
                <th scope="col">Level</th>
                <th class="col-md-3" scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @php $no = 1; @endphp
            @foreach ($data as $item)
            <!-- menampilkan mahasiswa saja -->
            <tr>
                <td>{{ $no++ }}</td> <!-- Nomor urut -->
                <td>{{ $item->username }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ $item->prodi }}</td>
                <td>{{ $item->semester }}</td>
                <td>{{ $item->level }}</td>
                <td>
                    <a class="btn btn-outline-success" href="/laboran/user/detail/{{ $item->id }}">Detail</a>
                    <a class="btn btn-outline-warning" href="/laboran/user/edit/{{ $item->id }}">Edit</a>
                    <a class="btn btn-outline-danger" href="/deleteUser/{{ $item->id }}"
                        onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?');">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table><br>

</div>

<!-- Content Row -->
</div>
</div>
@endsection