<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pemakaian Laboratorium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .table thead {
            background-color: #007BFF;
            color: white;
        }

        .table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }

        .signature {
            margin-top: 30px;
            text-align: center;
        }

        .editable {
            border: 1px solid #ccc;
            padding: 5px;
            text-align: center;
            width: 100%;
            max-width: 250px;
            display: inline-block;
        }

        /* Mode cetak: Sembunyikan tombol & hapus border input */
        @media print {
            .btn-print {
                display: none;
            }

            .editable {
                border: none;
                outline: none;
                pointer-events: none;
                background: transparent;
            }
        }
    </style>
</head>

<body>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- Tombol Cetak di Kiri -->
            <button class="btn btn-primary btn-print" onclick="printDocument()">
                <i class="bi bi-printer"></i> Cetak
            </button>
        </div>

        <h3 class="text-center">POLITEKNIK NEGERI BENGKALIS</h3>
        <h4 class="text-center">JADWAL PEMAKAIAN LABORATORIUM</h4>

        <!-- Nama Lab & Tahun Ajaran Sejajar -->
        <div class="row">
            <div class="col-md-6">
                <p><strong>Laboratorium:</strong>
                    <input type="text" class="editable form-control d-inline w-50" id="nama_lab" value="Basis Data">
                </p>
            </div>

        </div>

        <p><strong>Jurusan:</strong> Teknik Informatika</p>

        <div class="col-md-6">
            <p><strong>Tahun Ajaran:</strong>
                <input type="text" class="editable form-control d-inline w-50" id="tahun_ajaran"
                    value="2021/2022 (Semester Genap)">
            </p>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Hari</th>
                    <th>Jam</th>
                    <th>Semester</th>
                    <th>Mata Kuliah</th>
                    <th>Dosen</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    @if ($item->nama_lab == Auth::user()->nama_lab)
                        <tr>
                            <td>{{ $item->hari }}</td>
                            <td>{{ $item->jam_mulai }} - {{ $item->jam_selesai }}</td>
                            <td>{{ $item->kelas }}</td>
                            <td>{{ $item->mata_kuliah }}</td>
                            <td>{{ $item->dosen }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        <br>
        <p class="text-end"><strong>Tanggal Cetak:</strong> <?php echo date('d F Y'); ?></p>

        <div class="row signature">
            <div class="col text-center">
                <p>Mengetahui, <br> Ketua Jurusan Teknik Informatika</p>
                <input type="text" class="editable form-control" id="kajur" value="Danur S.">
            </div>
            <div class="col text-center">
                <p>Disetujui, <br> Kepala Laboratorium</p>
                <br>
                <input type="text" class="editable form-control" id="kalab" value="Fajri Profesor Putra, M.CS">
            </div>
            <div class="col text-center">
                <p>Dibuat oleh, <br> Laboran</p>
                <br>
                <input type="text" class="editable form-control" id="laboran" value="{{ Auth::user()->username }}">
            </div>
        </div>
    </div>

    <script>
        function printDocument() {
            // Simpan perubahan sebelum mencetak
            localStorage.setItem('kajur', document.getElementById('kajur').value);
            localStorage.setItem('kalab', document.getElementById('kalab').value);
            localStorage.setItem('tahun_ajaran', document.getElementById('tahun_ajaran').value);
            localStorage.setItem('laboran', document.getElementById('laboran').value);
            localStorage.setItem('nama_lab', document.getElementById('nama_lab').value);

            window.print();
        }

        // Load data yang sudah diedit sebelumnya dari localStorage
        document.addEventListener("DOMContentLoaded", function() {
            if (localStorage.getItem('kajur')) {
                document.getElementById('kajur').value = localStorage.getItem('kajur');
            }
            if (localStorage.getItem('kalab')) {
                document.getElementById('kalab').value = localStorage.getItem('kalab');
            }
            if (localStorage.getItem('tahun_ajaran')) {
                document.getElementById('tahun_ajaran').value = localStorage.getItem('tahun_ajaran');
            }
            if (localStorage.getItem('laboran')) {
                document.getElementById('laboran').value = localStorage.getItem('laboran');
            }
            if (localStorage.getItem('nama_lab')) {
                document.getElementById('nama_lab').value = localStorage.getItem('nama_lab');
            }
        });
    </script>

</body>

</html>
