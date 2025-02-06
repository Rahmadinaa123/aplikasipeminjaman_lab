@extends('layouts.mahasiswa.app', [
'title' => 'jadwal Laboratorium',
'contentTitle' => 'Dashboard',
])

@section('konten')
<div class="container mt-5">
    <h2 class="mb-4 text-center">Jadwal Laboratorium</h2>

    <!-- Lab Selection Dropdown -->
    <form method="GET" action="{{ route('mahasiswa.jadwal') }}" class="mb-4">
        <div class="form-group">
            <label for="lab">Choose a Lab:</label>
            <select name="lab" id="lab" class="form-control" onchange="this.form.submit()">
                <option value="">All Labs</option>
                @foreach ($labs as $lab)
                <option value="{{ $lab }}" {{ $selectedLab == $lab ? 'selected' : '' }}>
                    {{ $lab }}
                </option>
                @endforeach
            </select>
        </div>
    </form>

    <!-- Schedule Table -->
    <table class="table table-bordered table-striped table-hover">
        <thead class="table-primary">
            <tr>
                <th>Hari</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Kelas</th>
                <th>Mata Kuliah</th>
                <th>Dosen</th>
                <th>Lab</th>
            </tr>
        </thead>
        <tbody>
            @php $currentDay = '' @endphp
            @forelse($jadwal as $item)
            <tr>
                @if ($currentDay != $item->hari)
                <td>{{ ucfirst($item->hari) }}</td>
                @php $currentDay = $item->hari @endphp
                @else
                <td></td>
                @endif
                <td>{{ $item->tanggal}}</td>
                <td>{{ $item->jam_mulai }} - {{ $item->jam_selesai }}</td>
                <td>{{ $item->kelas }}</td>
                <td>{{ $item->mata_kuliah }}</td>
                <td>{{ $item->dosen }}</td>
                <td>{{ $item->nama_lab }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="6" class="text-center">No data available for the selected lab</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js"></script>
@endsection