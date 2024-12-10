<?php

namespace App\Http\Controllers;
use App\Models\peminjamanInventarisLab;
use App\Models\User;
use App\Models\inventarisLab;
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
        $inventaris=inventarisLab::all();
        return view('Laboran.peminjaman_inventaris.tambahdata', compact('users','inventaris'));
   }

   public function postPeminjamanInventaris(Request $request)
{
    // Validasi data dari form
    $request->validate([
        'username' => 'required',              // Nama peminjam
        'id_user'=> 'required',               
        'nim' => 'required',
        'prodi' => 'required',
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
    $peminjaman->id_user = $request->id_user; // Menambahkan id_user
    $peminjaman->username = $request->username; // Menggunakan username sebagai nama peminjam
    $peminjaman->nim = $request->nim;
    $peminjaman->prodi = $request->prodi;
    $peminjaman->semester = $request->semester;
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

 public function editPeminjamanInventaris($id) {
        $peminjaman = peminjamanInventarisLab::find($id);
        $inventaris=inventarisLab::all();
        return view('laboran.peminjaman_inventaris.edit', compact('peminjaman','inventaris'));
    }

    public function postEditPeminjamanInventaris(Request $request, $id)
{
    $request->validate([
        'username' => 'required',               // Nama peminjam
        'nim' => 'required',                    // NIM mahasiswa
        'prodi' => 'required',                  // Program studi
        'nama_barang' => 'required',            // Nama barang
        'nama_lab' => 'required',               // Nama lab terkait
        'tanggal_pinjam' => 'required|date',    // Tanggal peminjaman
        'tanggal_kembali' => 'nullable|date',   // Tanggal kembali (opsional)
        'jam_pinjam' => 'required',             // Jam mulai peminjaman
        'jam_kembali' => 'nullable',            // Jam kembali (opsional)
        'keperluan' => 'required',              // Keperluan peminjaman
        'status' => 'required'                  // Status peminjaman
    ]);

    // Cari data peminjaman inventaris berdasarkan ID
    $peminjaman_inventaris = peminjamanInventarisLab::find($id);

    // Update data dengan input dari form
    $peminjaman_inventaris->username = $request->username;
    $peminjaman_inventaris->nim = $request->nim;
    $peminjaman_inventaris->prodi = $request->prodi;
    $peminjaman_inventaris->nama_barang = $request->nama_barang;
    $peminjaman_inventaris->nama_lab = $request->nama_lab;
    $peminjaman_inventaris->tanggal_pinjam = $request->tanggal_pinjam;
    $peminjaman_inventaris->tanggal_kembali = $request->tanggal_kembali;
    $peminjaman_inventaris->jam_pinjam = $request->jam_pinjam;
    $peminjaman_inventaris->jam_kembali = $request->jam_kembali;
    $peminjaman_inventaris->keperluan = $request->keperluan;
    $peminjaman_inventaris->status = $request->status;

    // Simpan data yang sudah diupdate
    $peminjaman_inventaris->save();

    // Redirect dengan pesan keberhasilan atau kegagalan
    if ($peminjaman_inventaris) {
        return redirect('/laboran/peminjaman_inventaris')->with('success', 'Data Peminjaman Inventaris berhasil diupdate!');
    } else {
        return back()->with('failed', 'Data gagal diupdate!');
    }
}

public function deletePeminjamanInventaris($id)
    {
        $peminjaman_inventaris = peminjamanInventarisLab::find($id);
        $peminjaman_inventaris->delete();
        if ($peminjaman_inventaris) {
            return back()->with('success', 'Data Peminjaman Inventaris Lab berhasil di hapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data Peminjaman Lab!');
        }
    }


}