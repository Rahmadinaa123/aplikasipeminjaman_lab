@extends('layouts.laboran.app', [
'title' => 'Data inventaris Lab',
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
<h3>Data Inventaris lab {{ Auth::user()->nama_lab }} </h3>
<br>
<a class="btn btn-outline-success" href="{{ route('laboran.inventaris_lab.tambah') }}">Tambah Data</a>
<div>
    <table class="table table-bordered table-striped table-hover" style="margin-top: 10px">
        <thead class="table-primary">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Barang</th>
                <th scope="col">Kode Barang</th>
                <th scope="col">Kategori</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Kondisi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @php $no = 1; @endphp
            @foreach ($data as $item)
            <!-- menampilkan mahasiswa saja -->
            @if ($item->nama_lab == Auth::user()->nama_lab)
            <tr>
                <td class="">{{ $no++ }}</td>
                <td>{{ $item->nama_barang }}</td>
                <td>{{ $item->kode_barang }}</td>
                <td>{{ $item->kategori }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ $item->kondisi }}</td>
                <td>
                    <a class="btn btn-outline-success" href="/laboran/inventaris_lab/detail/{{$item->id}}">Detail</a>
                    <a class="btn btn-outline-warning" href="/laboran/inventaris_lab/editInventarisLab/{{$item->id}}">Edit</a>
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