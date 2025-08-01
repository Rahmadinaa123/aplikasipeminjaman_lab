<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use Illuminate\Http\Request;

class MahasiswaPeminjamanLabController extends Controller
{
    public function postPeminjamanLab(Request $request)
{
    // Validasi input
    $request->validate([
        'username' => 'required',
        'id_user' => 'required',
        'nim' => 'required',
        'prodi' => 'required',
        'semester' => 'required|integer|min:1|max:14',
        'nama_lab' => 'required',
        'tanggal_mulai' => 'required|date',
        'tanggal_selesai' => 'required|date',
        'jam_mulai' => 'required|date_format:H:i',
        'jam_selesai' => 'required|date_format:H:i',
        'keperluan' => 'required',
    ]);

    // Mengecek apakah lab sudah dipinjam pada waktu yang dimasukkan
    $isLabBooked = Peminjaman::where('nama_lab', $request->nama_lab)
        ->where('tanggal_mulai', $request->tanggal_mulai)
        ->where(function ($query) use ($request) {
            $query->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai])
                  ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai])
                  ->orWhere(function ($q) use ($request) {
                      $q->where('jam_mulai', '<=', $request->jam_mulai)
                        ->where('jam_selesai', '>=', $request->jam_selesai);
                  });
        })
        ->exists();

    if ($isLabBooked) {
        // Kembali ke halaman sebelumnya dengan pesan error
        return redirect()->back()->with('failed', 'Lab sudah dipinjam pada waktu yang Anda pilih.');
    }

    // Membuat instance Peminjaman dan menyimpan data
    $peminjaman_lab = new Peminjaman;
    $peminjaman_lab->id_user = $request->id_user;
    $peminjaman_lab->username = $request->username;
    $peminjaman_lab->nim = $request->nim;
    $peminjaman_lab->prodi = $request->prodi;
    $peminjaman_lab->semester = $request->semester;
    $peminjaman_lab->nama_lab = $request->nama_lab;
    $peminjaman_lab->tanggal_mulai = $request->tanggal_mulai;
    $peminjaman_lab->tanggal_selesai = $request->tanggal_selesai;
    $peminjaman_lab->jam_mulai = $request->jam_mulai;
    $peminjaman_lab->jam_selesai = $request->jam_selesai;
    $peminjaman_lab->keperluan = $request->keperluan;

    // Menyimpan data ke database
    $peminjaman_lab->save();

    // Redirect dengan pesan sukses
    if ($peminjaman_lab) {
        return redirect('/mahasiswa/daftarLab')->with('success', 'Data berhasil disimpan!');
    } else {
        return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
    }
}

   public function cekKetersediaanLab(Request $request)
{
    $request->validate([
        'nama_lab' => 'required|string',
        'tanggal_mulai' => 'required|date',
        'jam_mulai' => 'required',
        'jam_selesai' => 'required',
    ]);

    // Cek apakah ada peminjaman pada tanggal dan jam yang sama
    $isBentrok = Peminjaman::where('nama_lab', $request->nama_lab)
        ->where('tanggal_mulai', $request->tanggal_mulai) // Cek tanggal
        ->where(function ($query) use ($request) {
            $query->whereBetween('jam_mulai', [$request->jam_mulai, $request->jam_selesai]) // Jam mulai bentrok
                  ->orWhereBetween('jam_selesai', [$request->jam_mulai, $request->jam_selesai]) // Jam selesai bentrok
                  ->orWhere(function ($subquery) use ($request) { 
                      $subquery->where('jam_mulai', '<=', $request->jam_mulai)
                               ->where('jam_selesai', '>=', $request->jam_selesai); // Jam di antara jadwal
                  });
        })
        ->exists();

    return response()->json([
        'available' => !$isBentrok,
        'message' => $isBentrok ? 'Lab sudah dipinjam pada tanggal dan waktu ini.' : 'Lab tersedia.',
    ]);
}

public function checkAvailability(Request $request)
{
    // Validasi input pengguna
    $request->validate([
        'tanggal_mulai' => 'required|date',
        'jam_mulai' => 'required|date_format:H:i',
    ]);

    $tanggalMulai = $request->input('tanggal_mulai');
    $jamMulai = $request->input('jam_mulai');

    // Ambil nama lab yang sedang dipinjam pada tanggal dan waktu tersebut
    $labTidakTersedia = peminjaman::where('tanggal_mulai', '<=', $tanggalMulai)
        ->where('tanggal_selesai', '>=', $tanggalMulai)
        ->where(function ($query) use ($jamMulai) {
            $query->where(function ($subQuery) use ($jamMulai) {
                $subQuery->where('jam_mulai', '<=', $jamMulai)
                         ->where('jam_selesai', '>=', $jamMulai);
            });
        })
        ->where('status', '=', 'pinjam') // Hanya cek status "pinjam"
        ->pluck('nama_lab');

    // Daftar semua lab
    $allLabs = ['Lab Testing', 'Lab Artificial Intelligence', 'Lab Jaringan Komputer', 'Lab Pemrograman Lanjut', 'Lab Software Development', 'Lab Multimedia', 'Lab Basis Data', 'Lab Sistem Informasi', 'Lab Internet Of Things', 'Lab Sistem Keamanan'];

    // Hitung lab yang tersedia
    $availableLabs = array_diff($allLabs, $labTidakTersedia->toArray());

    return view('mahasiswa.labtersedia', compact('availableLabs', 'tanggalMulai', 'jamMulai'));
}

public function riwayatpeminjamanLab() {
    $data = peminjaman::orderBy('created_at', 'desc')->get(); // jika pakai created_at
    return view('mahasiswa.riwayatPeminjaman.riwayatpeminjamanlab', compact('data'));
}

 public function editSuratPeminjaman(Request $request, $id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        return view('mahasiswa.riwayatPeminjaman.cetak', compact('peminjaman'));
    }


}