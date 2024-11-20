@extends('layouts.laboran.app', [
    'title' => 'Detail Data Peminjaman Inventaris',
])

@section('konten')
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="card mt-4 mb-5" style="width: 800px">
                <div class="card-body">
                    <h5 class="card-title text-center">Detail Data Peminjaman Inventaris</h5>
                    <table class="table" style="border: 0;">
                        <tbody>
                            <tr>
                                <th>Username</th>
                                <td>{{ $data->username }}</td>
                            </tr>
                            <tr>
                                <th>NIM</th>
                                <td>{{ $data->nim }}</td>
                            </tr>
                            <tr>
                                <th>Prodi</th>
                                <td>{{ $data->prodi }}</td>
                            </tr>
                            <tr>
                                <th>Semester</th>
                                <td>{{ $data->semester }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lab</th>
                                <td>{{ $data->nama_lab }}</td>
                            </tr>
                            <tr>
                                <th>Nama Barang</th>
                                <td>{{ $data->nama_barang }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Pinjam</th>
                                <td>{{ $data->tanggal_pinjam }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Kembali</th>
                                <td>{{ $data->tanggal_kembali }}</td>
                            </tr>
                            <tr>
                                <th>Jam Pinjam</th>
                                <td>{{ $data->jam_pinjam }}</td>
                            </tr>
                            <tr>
                                <th>Jam Kembali</th>
                                <td>{{ $data->jam_kembali }}</td>
                            </tr>
                            <tr>
                                <th>Keperluan</th>
                                <td>{{ $data->keperluan }}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td>{{ $data->status }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
