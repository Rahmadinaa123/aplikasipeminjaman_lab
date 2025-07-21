<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Peminjaman Laboratorium</title>
    <style>
        body {
            background: #ccc;
            padding: 20px;
            font-family: 'Times New Roman', Times, serif;
        }

        .a4-page {
            width: 794px;
            /* Setara 21 cm */
            min-height: 1123px;
            /* Setara 29.7 cm */
            margin: auto;
            padding: 40px 60px;
            background: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }

        .kop-container {
            display: flex;
            align-items: center;
        }

        .kop-logo {
            width: 90px;
            height: auto;
        }

        .kop-text {
            text-align: center;
            flex: 1;
            margin-left: -90px;
        }

        .kop-text h2,
        .kop-text h3 {
            margin: 0;
            line-height: 1.4;
        }

        .garis-dobel {
            border: 3px double black;
            margin-top: 5px;
            margin-bottom: 25px;
        }

        .content {
            font-size: 16px;
            line-height: 1.6;
        }

        .signature {
            margin-top: 60px;
            text-align: right;
        }

        .btn {
            background: yellow;
        }

        /* Cetak tetap A4 */
        @media print {
            input[type="text"] {
                border: none;
                outline: none;
            }

            .btn-print {
                display: none;
            }

            body {
                background: none;
                padding: 0;
            }

            .a4-page {
                box-shadow: none;
                margin: 0;
                width: auto;
                min-height: auto;
                padding: 0;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex justify-content-between align-items-center mb-3">
        <button class="btn btn-primary btn-print" onclick="printDocument()">
            <i class="bi bi-printer"></i> Cetak
        </button>
    </div>
    <div class="a4-page">
        <!-- Kop Surat -->
        <div class="kop-container">
            <img src="/assets/img/logopolbeng.png" class="kop-logo" alt="Logo">
            <div class="kop-text">
                <p style="font-size: 16px">KEMENTERIAN PENDIDIKAN, KEBUDAYAAN,<br>RISET, DAN TEKNOLOGI</p>
                <h3><strong>POLITEKNIK NEGERI BENGKALIS</strong></h3>
                <h3>JURUSAN TEKNIK INFORMATIKA</h3>
                <p>
                    Jalan Bathin Alam, Sungai Alam, Bengkalis, Riau 28711<br>
                    Telepon: (+62766) 24566, Fax: (+62766) 800 1000<br>
                    Laman: <a href="http://www.polbeng.ac.id">www.polbeng.ac.id</a>, E-mail: polbeng@polbeng.ac.id
                </p>
            </div>
        </div>

        <div class="garis-dobel"></div>

        <!-- Isi Surat -->
        <div class="content">
            <p style="text-align:right;">
                Bengkalis, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
            </p>

            <p>
                Lampiran : 1 Berkas<br>
                Perihal : Peminjaman Laboratorium {{ $peminjaman->nama_lab }}
            </p>

            <p>Kepada Yth.<br>
                Ka. Lab. {{ $peminjaman->nama_lab }}<br>
                Jurusan Teknik Informatika<br>
                Di – Kampus Politeknik Negeri Bengkalis</p>

            <p>Dengan hormat,</p>

            <p>Assalamualaikum Warohmatullahi Wabarokatuh, <br>
                Kami mahasiswa Program Studi {{ $peminjaman->prodi }} Semester {{ $peminjaman->semester }},
                dengan ini bermaksud memohon izin menggunakan fasilitas Laboratorium
                <strong>{{ $peminjaman->nama_lab }}</strong>
                untuk keperluan <strong>{{ $peminjaman->keperluan }}</strong>,
                yang dilaksanakan pada:
            </p>

            <p>
                Hari : <input id="hari" class="form-control" type="text" placeholder="masukkan hari"><br>
                Tanggal : {{ \Carbon\Carbon::parse($peminjaman->tanggal_mulai)->translatedFormat('d F Y') }}
                -
                {{ $peminjaman->tanggal_selesai
                    ? \Carbon\Carbon::parse($peminjaman->tanggal_selesai)->translatedFormat('d F Y')
                    : 'Skripsi selesai' }}
                <br>
                Waktu : {{ \Carbon\Carbon::parse($peminjaman->jam_mulai)->format('H:i') }} -
                {{ \Carbon\Carbon::parse($peminjaman->jam_selesai)->format('H:i') }}

            </p>

            <p>
                Kami bertanggung jawab penuh terhadap fasilitas laboratorium. Penanggung jawab dan anggota terlampir
                pada lampiran. Demikian surat ini kami buat dengan sebenar-benarnya. Atas perhatian Bapak/Ibu kami
                ucapkan terima
                kasih. Wassalamu’alaikum Warohmatullahi Wabarokatuh.</p>

            <div class="signature">
                Ka. {{ $peminjaman->nama_lab }}<br><br><br><br>
                <strong><input id="kalab" type="text" value="Muhammad Asep Subandri, M.Kom"
                        style="text-decoration: underline; font-weight: bold;" size="27">
                </strong><br>
                <input id="nip" value="199212092022031006" type="text">
            </div>
        </div>
    </div>
</body>


</html>

<script>
    function printDocument() {
        // Simpan nilai yang bisa diedit ke localStorage
        localStorage.setItem('hari', document.getElementById('hari').value);
        localStorage.setItem('kalab', document.getElementById('kalab').value);
        localStorage.setItem('nip', document.getElementById('nip').value);
        // Cetak dokumen
        window.print();
    }
</script>
