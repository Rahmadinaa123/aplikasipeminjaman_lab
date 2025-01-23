<style>
table {
    width: 80%;
    border-collapse: collapse;
}

table th,
table td {
    padding: 10px 15px;
    border-bottom: 1px solid #ddd;
    text-align: left;
}

table td:nth-child(1),
table td:nth-child(5),
table td:nth-child(7) {
    text-align: center;
}

table th:nth-child(1),
table th:nth-child(3),
table th:nth-child(6) {
    width: 100px;
}

.button-edit {
    margin-right: 10px;
    background-color: #f0ad4e;
    /* warna kuning */
    color: white;
}

.button-delete {
    background-color: red;
    color: white;
}
</style>

@extends('layouts.kalab.app', [
'title' => 'Data peminjaman Lab',
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
<h3>Data Peminjaman {{ Auth::user()->nama_lab }}</h3>
<br>

<div>
    <table class="table table-bordered table-striped table-hover" style="margin-top: 10px">
        <thead class="table-primary">
            <tr class="col-md-12">
                <th>No</th>
                <th>Nama Peminjam</th>
                <th>NIM</th>
                <th>Tanggal Peminjaman</th>
                <th>Jam Pemakaian</th>
                <th>Keperluan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody class="table-group-divider">
            @php $no = 1; @endphp
            @foreach ($data as $item)
            @if ($item->nama_lab == Auth::user()->nama_lab)
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->username }}</td>
                <td>{{ $item->nim }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_mulai)->format('d-m-Y') }} -
                    {{ \Carbon\Carbon::parse($item->tanggal_selesai)->format('d-m-Y') }}</td>
                <td>{{ \Carbon\Carbon::parse($item->jam_mulai)->format('H:i') }} -
                    {{ \Carbon\Carbon::parse($item->jam_selesai)->format('H:i') }}</td>
                <td>{{ $item->keperluan }}</td>
                <td>
                    <form action="{{ url('/kalab/updateStatus/'.$item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" onchange="this.form.submit()" class="form-control form-select-sm">
                            <option value="pending" {{ $item->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="pinjam" {{ $item->status == 'pinjam' ? 'selected' : '' }}>Pinjam
                            </option>
                            <option value="selesai" {{ $item->status == 'selesai' ? 'selected' : '' }}>Selesai
                            </option>
                            <option value="ditolak" {{ $item->status == 'ditolak' ? 'selected' : '' }}>Ditolak
                            </option>
                        </select>

                    </form>
                </td>
                <td>
                    <a class="btn btn-outline-success" href="/kalab/peminjaman_lab/detail/{{ $item->id }}">Detail</a>
                </td>
            </tr>
            @endif
            @endforeach
        </tbody>
    </table>
    <br>
</div>


<!-- Content Row -->
</div>
</div>
@endsection