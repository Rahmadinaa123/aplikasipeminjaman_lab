<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Surat Peminjaman Laboratorium</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 40px;
        }

        .header {
            text-align: center;
            line-height: 1.5;
        }

        .content {
            margin-top: 30px;
            font-size: 16px;
            line-height: 1.6;
        }

        .signature {
            margin-top: 60px;
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="header">
        <strong>KEMENTERIAN PENDIDIKAN, KEBUDAYAAN, RISET, DAN TEKNOLOGI</strong><br>
        <strong>POLITEKNIK NEGERI BENGKALIS</strong><br>
        <strong>JURUSAN TEKNIK INFORMATIKA</strong><br>
        Jalan Bathin Alam, Sungai Alam, Bengkalis, Riau 28711 <br>
        Telepon: (+62766) 24566, Fax: (+62766) 800 1000 <br>
        Laman: http://www.polbeng.ac.id, E-mail: polbeng@polbeng.ac.id
    </div>

    <div class="content">
        <p style="text-align:right;">
            Bengkalis, {{ \Carbon\Carbon::now()->translatedFormat('d F Y') }}
        </p>

        <p>
            Lampiran : 1 Berkas<br>
            Perihal : Peminjaman Laboratorium {{ $request->nama_lab }}
        </p>

        <p>Kepada Yth.<br>
            Ka. Lab. {{ $request->nama_lab }}<br>
            Jurusan Teknik Informatika<br>
            Di – Kampus Politeknik Negeri Bengkalis</p>

        <p>Dengan hormat,</p>

        <p>Assalamualaikum Warohmatullahi Wabarokatuh,</p>

        <p>
            Segala Puji dan Syukur hanya milik Allah SWT. Kami mahasiswa Program Studi {{ $peminjaman->prodi }} Semester
            {{ $peminjaman->semester }},
            dengan ini bermaksud memohon izin menggunakan fasilitas Laboratorium
            <strong>{{ $request->nama_lab }}</strong>
            dengan tujuan untuk <strong>{{ $request->keperluan }}</strong>, yang dilaksanakan dengan hari dan waktu
            sebagai berikut:
        </p>

        <p>
            Hari : {{ $request->hari }} <br>
            Tanggal : {{ $request->tanggal_mulai }} - {{ $request->tanggal_selesai ?? 'Skripsi selesai' }} <br>
            Waktu : {{ $request->jam_mulai }} - {{ $request->jam_selesai }}
        </p>

        <p>
            Kami bersedia bertanggung jawab penuh terhadap fasilitas laboratorium tersebut. Adapun penanggung jawab
            beserta anggota terlampir pada lampiran ini.
        </p>

        <p>
            Demikian surat peminjaman laboratorium ini kami buat dengan penuh tanggung jawab. Atas perhatian Bapak/Ibu
            kami ucapkan terima kasih.
        </p>

        <p>Wassalamu’alaikum Warohmatullahi Wabarokatuh.</p>

        <div class="signature">
            Ka. Lab. {{ $request->nama_lab }}<br><br><br><br>
            <strong><input type="text"></strong><br>
            <input type="text">
        </div>
    </div>
</body>

</html>
