<?php

namespace App\Http\Controllers;
use App\Models\peminjamanInventarisLab;
use Illuminate\Http\Request;

class KalabPeminjamanInventarisController extends Controller
{
     //halaman Peminjaman Inventaris 
    public function index() {
        $data=PeminjamanInventarisLab::all();
        return view('Kalab.peminjaman_inventaris.Index', compact('data'));
   }
    public function detail($id) {
        $data = PeminjamanInventarisLab::find($id);
        return view('kalab.peminjaman_inventaris.detail', compact('data'));
    }
    public function editpeminjamanInventaris($id) {
        $peminjaman = PeminjamanInventarisLab::find($id);
        return view('kalab.peminjaman_inventaris.edit', compact('data'));
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
        return redirect('/kalab/peminjaman_inventaris')->with('success', 'Data Peminjaman Inventaris berhasil diupdate!');
    } else {
        return back()->with('failed', 'Data gagal diupdate!');
    }
}

}