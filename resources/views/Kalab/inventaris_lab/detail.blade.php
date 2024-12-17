@extends('layouts.kalab.app', [
    'title' => 'Detail Data Inventaris',
])


@section('konten')
    <div class="row">
        <div class="col d-flex justify-content-center">
            <div class="card mt-4 mb-5" style="width: 800px">
                <div class="card-body">
                    <a class="btn btn-outline-warning" href="{{ route('kalab.inventaris_lab') }}">Kembali</a>
                    <h5 class="card-title text-center">Detail Data Inventaris {{ Auth::user()->nama_lab }}</h5>
                    <table class="table" style="border: 0;">
                        <tbody>
                            <tr>
                                <th>Nama Barang</th>
                                <td>{{ $data->nama_barang }}</td>
                            </tr>
                            <tr>
                                <th>Nama Lab</th>
                                <td>{{ $data->nama_lab }}</td>
                            </tr>
                            <tr>
                                <th>Kode Barang</th>
                                <td>{{ $data->kode_barang }}</td>
                            </tr>
                            <tr>
                                <th>Kategori</th>
                                <td>{{ $data->kategori }}</td>
                            </tr>
                            <tr>
                                <th>Jumlah</th>
                                <td>{{ $data->jumlah }}</td>
                            </tr>
                            <tr>
                                <th>Kondisi</th>
                                <td>{{ $data->kondisi }}</td>
                            </tr>
                            <tr>
                                <th>Dibuat Pada</th>
                                <td>{{ $data->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                            <tr>
                                <th>Diperbarui Pada</th>
                                <td>{{ $data->updated_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
