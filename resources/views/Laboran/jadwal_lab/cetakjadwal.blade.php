<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal Pemakaian Laboratorium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            /* Buat tabel melebar */
        }


        .kop-surat {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid black;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .kop-logo {
            width: 80px;
            height: 80px;
            object-fit: contain;
        }

        .kop-text {
            flex-grow: 1;
            text-align: center;
        }

        .kop-text h3,
        .kop-text h4 {
            margin: 0;
            font-size: 18px;
        }

        .kop-detail p {
            display: flex;
            align-items: center;
            gap: 10px;
            /* Beri jarak antara label dan input */
        }

        .kop-detail input {
            border: 1px solid #ccc;
            padding: 5px;
            text-align: left;
            width: auto;
            /* Tidak terlalu besar */
            max-width: 150px;
            /* Batasi lebar input */
            height: 25px;
            /* Sesuaikan tinggi input */
            font-size: 14px;
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

            body {
                margin: 0;
                padding: 10px;
                width: 100%;
                max-width: none;
            }

            .container {
                width: 100%;
                max-width: none;
                padding: 0 10px;
            }

            table {
                width: 100%;
            }

        }
    </style>
</head>

<body>

    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <button class="btn btn-primary btn-print" onclick="printDocument()">
                <i class="bi bi-printer"></i> Cetak
            </button>
        </div>

        <div class="kop-surat">
            <img src="/assets/img/logo_polbeng.png" alt="Logo" class="kop-logo">
            <div class="kop-text">
                <h2><strong>POLITEKNIK NEGERI BENGKALIS</strong></h2>
                <h3><strong>JADWAL PEMAKAIAN LABORATORIUM</strong></h3>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6">
                <p><strong>Laboratorium:</strong>
                    <input type="text" class="editable form-control d-inline w-50" id="nama_lab"
                        value="{{ Auth::user()->nama_lab }}">
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
                @php
                    // Filter data yang hanya sesuai dengan nama lab user saat ini
                    $filteredData = collect($data)
                        ->where('nama_lab', Auth::user()->nama_lab)
                        ->values();

                    // Hitung jumlah baris per hari setelah difilter
                    $rowspanCounts = $filteredData->countBy('hari');

                    $previousHari = null;
                @endphp

                @foreach ($filteredData as $item)
                    <tr>
                        {{-- Jika hari sebelumnya berbeda, cetak hari dengan rowspan --}}
                        @if ($item->hari !== $previousHari)
                            <td rowspan="{{ $rowspanCounts[$item->hari] }}">{{ ucfirst($item->hari) }}</td>
                            @php $previousHari = $item->hari; @endphp
                        @endif

                        {{-- Cetak data jadwal --}}
                        <td>{{ $item->jam_mulai }} - {{ $item->jam_selesai }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->mata_kuliah }}</td>
                        <td>{{ $item->dosen }}</td>
                    </tr>
                @endforeach
            </tbody>








        </table>


        <br>
        <p class="text-end">Bengkalis, <span id="tanggalCetak"></span></p>

        <div class="row signature">
            <div class="col text-center">
                <p>Mengetahui, <br> Ketua Jurusan Teknik Informatika</p>
                <br>
                <input type="text" class="editable form-control" id="kajur" value="Danur S.">
                <input type="text" class="editable form-control" id="NIP_kajur" value="Nik. 122333333">
            </div>
            <div class="col text-center">
                <p>Disetujui, <br> Kepala Laboratorium</p>
                <br> <br>
                <input type="text" class="editable form-control" id="kalab" value="Fajri Profesor Putra, M.CS">
                <input type="text" class="editable form-control" id="NIP_kalab" value="768687997990101">
            </div>
            <div class="col text-center">
                <p>Dibuat oleh, <br> Laboran</p>
                <br> <br>
                <input type="text" class="editable form-control" id="laboran" value="Nama Laboran">
                <input type="text" class="editable form-control" id="NIP_laboran" value="768687997990101">
            </div>
        </div>
    </div>

    <script>
        function printDocument() {
            // Simpan nilai yang bisa diedit ke localStorage
            localStorage.setItem('kajur', document.getElementById('kajur').value);
            localStorage.setItem('kalab', document.getElementById('kalab').value);
            localStorage.setItem('laboran', document.getElementById('laboran').value);
            localStorage.setItem('NIP_laboran', document.getElementById('NIP_laboran').value);
            localStorage.setItem('NIP_kajur', document.getElementById('NIP_kajur').value);
            localStorage.setItem('NIP_kalab', document.getElementById('NIP_kalab').value);

            // Cetak dokumen
            window.print();
        }

        // Load data yang sudah diedit sebelumnya dari localStorage
        document.addEventListener("DOMContentLoaded", function() {
            const kajur = document.getElementById('kajur');
            const kalab = document.getElementById('kalab');
            const laboran = document.getElementById('laboran');
            const nipLaboran = document.getElementById('NIP_laboran');
            const nipKajur = document.getElementById('NIP_kajur');
            const nipKalab = document.getElementById('NIP_kalab');
            const tanggalCetak = document.getElementById('tanggalCetak');

            if (kajur && localStorage.getItem('kajur')) kajur.value = localStorage.getItem('kajur');
            if (kalab && localStorage.getItem('kalab')) kalab.value = localStorage.getItem('kalab');
            if (laboran && localStorage.getItem('laboran')) laboran.value = localStorage.getItem('laboran');
            if (nipLaboran && localStorage.getItem('NIP_laboran')) nipLaboran.value = localStorage.getItem(
                'NIP_laboran');
            if (nipKajur && localStorage.getItem('NIP_kajur')) nipKajur.value = localStorage.getItem('NIP_kajur');
            if (nipKalab && localStorage.getItem('NIP_kalab')) nipKalab.value = localStorage.getItem('NIP_kalab');

            // Set tanggal cetak jika elemen tersedia
            if (tanggalCetak) {
                let today = new Date();
                let options = {
                    day: 'numeric',
                    month: 'long',
                    year: 'numeric'
                };
                tanggalCetak.textContent = today.toLocaleDateString('id-ID', options);
            }

            // Tambahkan event listener untuk tombol cetak jika ada
            const printButton = document.getElementById('printButton');
            if (printButton) {
                printButton.addEventListener('click', printDocument);
            }
        });
    </script>


</body>

</html>
