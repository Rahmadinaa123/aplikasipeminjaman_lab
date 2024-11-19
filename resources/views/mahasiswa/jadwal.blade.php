@extends('layouts.mahasiswa.app', [
'title' => 'jadwal Laboratorium',
'contentTitle' => 'Dashboard',
])

@section('konten')

<div class="container mt-5">
    <h2 class="mb-4 text-center">Jadwal Labs</h2>

    <!-- Lab Selection Dropdown -->
    <form method="GET" action="{{ route('mahasiswa.jadwal') }}" class="mb-4">
        <div class="form-group">
            <label for="lab">Choose a Lab:</label>
            <select name="lab" id="lab" class="form-control" onchange="this.form.submit()">
                <option value="">All Labs</option>
                @foreach($labs as $lab)
                    <option value="{{ $lab }}" {{ $selectedLab == $lab ? 'selected' : '' }}>
                        {{ $lab }}
                    </option>
                @endforeach
            </select>
        </div>
    </form>

    <!-- Schedule Table -->
    <table class="table table-bordered">
        <thead class="thead-light">
            <tr>
                <th>Day</th>
                <th>Hour</th>
                <th>Class</th>
                <th>Courses</th>
                <th>Lecturer</th>
                <th>Labs</th>
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
                    <td>{{ $item->jam_mulai }} - {{ $item->jam_selesai }}</td>
                    <td>{{ $item->kelas }}</td>
                    <td>{{ $item->mata_kuliah }}</td>
                    <td>{{ $item->dosen }}</td>
                    <td>{{ $item->nama_lab}}</td>
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