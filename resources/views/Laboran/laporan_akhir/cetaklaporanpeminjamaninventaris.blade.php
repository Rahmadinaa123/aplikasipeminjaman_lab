<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Cetak Laporan Peminjaman Inventaris</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12pt;
            margin: 20px;
        }

        h2,
        h3,
        p {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th {
            background-color: #f2f2f2;
            padding: 8px;
            text-align: center;
        }

        td {
            padding: 8px;
        }

        .footer {
            margin-top: 50px;
            float: right;
            text-align: right;
            margin-right: 20px;
        }

        .no-print {
            display: none;
        }

        @media print {
            .no-print {
                display: none;
            }
        }
    </style>
</head>

<body>
    <button class="btn-primary" onclick="window.print()">Cetak</button>

    <div>
        <h2>Politeknik Negeri Bengkalis <br> Jurusan Teknik Informatika</h2>
        <h3>Laporan Peminjaman Inventaris Laboratorium {{ Auth::user()->nama_lab }}</h3>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>NIM</th>
                <th>Prodi</th>
                <th>Nama Barang</th>
                <th>Tanggal Peminjaman</th>
                <th>Tanggal Pengembalian</th>
                <th>Keperluan</th>
                <th>Status</th>
            </tr>
        </thead>

        <tbody>
            @php $no = 1; @endphp
            @foreach ($data as $item)
                @if ($item->nama_lab == Auth::user()->nama_lab)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item['username'] }}</td>
                        <td>{{ $item['nim'] }}</td>
                        <td>{{ $item['prodi'] }}</td>
                        <td>{{ $item['nama_barang'] }}</td>
                        <td>{{ \Carbon\Carbon::parse($item['tanggal_pinjam'])->format('d-m-Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item['tanggal_kembali'])->format('d-m-Y') }}</td>
                        <td>{{ $item['keperluan'] }}</td>
                        <td>{{ $item['status'] }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>

    <br><br>
    <p>Dicetak pada: {{ now()->format('d-m-Y') }}</p>

    <div class="footer">
        <p>Mengetahui,</p>
        <p style="margin-top: 50px;">(____________________)</p>
        <p>Penanggung Jawab</p>
    </div>

    <br>
</body>

</html>
