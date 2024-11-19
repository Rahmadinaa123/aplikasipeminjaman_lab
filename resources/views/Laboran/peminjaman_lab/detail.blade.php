@extends('layouts.laboran.app', [
    'title' => 'Detail Data PeminjamanLab',
])
@section('konten')
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="card mt-4 mb-5" style="width: 800px">
                <div class="card-body">
                    <h5 class="card-title text-center">Detail Data
                        User</h5>
                    <table class="table" style="border: 0;">
                        <tbody>
                            <tr>
                                <th>Username</th>
                                <td>{{ $data->username }}</td>
                            </tr>
                            <tr>
                                <th>Nim</th>
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
                                <th>No.HP</th>
                                <td>{{ $data->no_hp }}</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>{{ $data->email }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lab</th>
                                <td>{{ $data->nama_lab }}</td>
                            </tr>
                            <tr>
                                <th>Level</th>
                                <td>{{ $data->level }}</td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            @endsection
