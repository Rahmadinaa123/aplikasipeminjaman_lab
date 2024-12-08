<?php

namespace App\Http\Controllers;
use App\Models\peminjamanInventarisLab;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanInventarisController extends Controller
{
    //halaman Peminjaman Inventaris 
    public function index() {
        $data=peminjamanInventarisLab::all();
        return view('Laboran.peminjaman_inventaris.Index', compact('data'));
   }

    //halaman Peminjaman Inventaris Lab
    public function addPeminjamanInventaris() {
        $users=User::all();
        return view('Laboran.peminjaman_inventaris.tambahdata', compact('users'));
   }

   public function postPeminjamanInventaris(Request $request)
{
    // Validasi data dari form
    $request->validate([
        'nama_barang' => 'required',                // Nama barang yang dipinjam
        'nama_lab' => 'required',                  // Nama laboratorium
        'tanggal_pinjam' => 'required|date',       // Tanggal peminjaman
        'tanggal_kembali' => 'nullable|date',      // Tanggal pengembalian
        'jam_pinjam' => 'required|date_format:H:i',// Jam mulai peminjaman
        'jam_kembali' => 'nullable|date_format:H:i',// Jam selesai peminjaman
        'keperluan' => 'required',                // Keperluan peminjaman
    ]);

    // Membuat instance baru dari model Peminjaman
    $peminjaman = new peminjamanInventarisLab;

    // Mengambil data dari request dan memasukkannya ke dalam model
    $peminjaman->nama_barang = $request->nama_barang; 
    $peminjaman->nama_lab = $request->nama_lab;
    $peminjaman->tanggal_pinjam = $request->tanggal_pinjam;
    $peminjaman->tanggal_kembali = $request->tanggal_kembali;
    $peminjaman->jam_pinjam = $request->jam_pinjam;
    $peminjaman->jam_kembali = $request->jam_kembali;
    $peminjaman->keperluan = $request->keperluan;

    // Menyimpan data ke database
    $peminjaman->save();

    // Mengecek apakah data berhasil disimpan
    if ($peminjaman) {
        return redirect('/laboran/peminjaman_inventaris')->with('success', 'Data peminjaman berhasil disimpan!');
    } else {
        return back()->with('failed', 'Maaf, terjadi kesalahan. Silakan coba lagi.');
    }
}

}