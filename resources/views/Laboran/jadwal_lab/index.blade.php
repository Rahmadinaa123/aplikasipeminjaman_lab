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
    <a class="btn btn-outline-success"href="{{ route('laboran.jadwal_lab.tambah') }}">Tambah Data</a>
    <div>
        <table class="table" style="margin-top: 10px">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Hari</th>
                    <th scope="col">Jam Mulai</th>
                    <th scope="col">Jam Selesai</th>
                    <th scope="col">Kelas</th>
                    <th scope="col">Prodi</th>
                    <th scope="col">Mata Kuliah</th>
                    <th scope="col">Dosen</th>
                    <th class="col-md-3" scope="col">Aksi</th>
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
                            <td>{{ $item->jam_mulai }}</td>
                            <td>{{ $item->jam_selesai }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->prodi }}</td>
                            <td>{{ $item->mata_kuliah }}</td>
                            <td>{{ $item->dosen }}</td>
                            <td>
                                <a class="btn btn-outline-success" href="/editUser/">Detail</a>
                                <a class="btn btn-outline-warning" href="/editUser/">Edit</a>
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
