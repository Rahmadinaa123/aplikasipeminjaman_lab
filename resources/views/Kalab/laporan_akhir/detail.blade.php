@extends('layouts.kalab.app', [
    'title' => 'Detail Data Peminjaman Lab',
])
@section('konten')
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="card mt-4 mb-5" style="width: 800px">
                <div class="card-body">
                    <a class="btn btn-outline-warning" href="{{ route('kalab.laporan_akhir') }}">Kembali</a>
                    <h5 class="card-title text-center">Detail Data Peminjaman Lab</h5>

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
                                <th>Keperluan</th>
                                <td>{{ $data->keperluan }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Mulai</th>
                                <td>{{ $data->tanggal_mulai }}</td>
                            </tr>
                            <tr>
                                <th>Tanggal Selesai</th>
                                <td>{{ $data->tanggal_selesai }}</td>
                            </tr>
                            <tr>
                                <th>Jam Mulai</th>
                                <td>{{ $data->jam_mulai }}</td>
                            </tr>
                            <tr>
                                <th>Jam Selesai</th>
                                <td>{{ $data->jam_selesai }}</td>
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
