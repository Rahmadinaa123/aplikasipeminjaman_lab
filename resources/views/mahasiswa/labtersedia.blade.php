@extends('layouts.mahasiswa.app', [
    'title' => 'Ketersediaan Lab',
    'contentTitle' => 'Dashboard',
])

@section('konten')
    <div class="container">
        <h1>Lab yang Tersedia</h1>
        <p>Untuk waktu: {{ date('d M Y H:i', strtotime($tanggalMulai)) }}</p>

        @if (!empty($availableLabs))
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Lab</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($availableLabs as $lab)
                        <tr>
                            <td>{{ $lab }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Tidak ada lab yang tersedia pada waktu tersebut.</p>
        @endif

        <a href="{{ route('cek.ketersediaan.lab') }}" class="btn btn-secondary mt-3">Kembali</a>
    </div>
@endsection
