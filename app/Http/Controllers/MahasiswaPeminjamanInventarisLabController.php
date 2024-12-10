<?php

namespace App\Http\Controllers;
use App\Models\peminjamanInventarisLab;
use App\Models\inventarisLab;
use Illuminate\Http\Request;

class MahasiswaPeminjamanInventarisLabController extends Controller
{
     //halaman Peminjaman Inventaris 
    public function index(Request $request) {
        $labName = $request->query('lab'); // Menangkap parameter lab dari URL
        $inventaris = InventarisLab::where('nama_lab', $labName)->get();
        return view('Mahasiswa.peminjamaninventaris', compact('labName','inventaris'));
   }
   
    public function postPeminjamanInventarisLab(Request $request) {
    // Validasi input dari form
    $request->validate([
        'username' => 'required',              // Nama peminjam
        'id_user'=> 'required',                
        'nim' => 'required',
        'prodi' => 'required',
        'semester' => 'required|integer|min:1|max:14',
        'nama_lab' => 'required',
        'nama_barang' => 'required',
        'tanggal_pinjam' => 'required|date',    // Tanggal mulai peminjaman
        'tanggal_kembali' => 'required|date',  // Tanggal selesai peminjaman
        'jam_pinjam' => 'required|date_format:H:i',    // Jam mulai pemakaian
        'jam_kembali' => 'required|date_format:H:i',  // Jam selesai pemakaian
        'keperluan' => 'required',
    ]);

    //dd($request->all());

    // Membuat instance baru dari model Peminjaman
    $peminjamaninventarislab = new peminjamanInventarisLab;

    // Mengambil data dari form dan menyimpannya ke dalam variabel
    $peminjamaninventarislab->id_user = $request->id_user; // Menambahkan id_user
    $peminjamaninventarislab->username = $request->username; // Menggunakan username sebagai nama peminjam
    $peminjamaninventarislab->nim = $request->nim;
    $peminjamaninventarislab->prodi = $request->prodi;
    $peminjamaninventarislab->semester = $request->semester;
    $peminjamaninventarislab->nama_lab = $request->nama_lab;
    $peminjamaninventarislab->nama_barang = $request->nama_barang;
    $peminjamaninventarislab->tanggal_pinjam = $request->tanggal_pinjam; // Sesuaikan dengan nama form
    $peminjamaninventarislab->tanggal_kembali = $request->tanggal_kembali; // Sesuaikan dengan nama form
    $peminjamaninventarislab->jam_pinjam = $request->jam_pinjam; // Sesuaikan dengan nama form
    $peminjamaninventarislab->jam_kembali = $request->jam_kembali; // Sesuaikan dengan nama form
    $peminjamaninventarislab->keperluan = $request->keperluan;

    // Menyimpan data ke database
    $peminjamaninventarislab->save();

    // Mengecek apakah proses simpan berhasil
    if ($peminjamaninventarislab) {
        return redirect('/mahasiswa/daftarLab')->with('success', 'Data Peminjaman Inventaris berhasil disimpan!');
    } else {
        return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
    }
}

public function riwayatpeminjamanInventarisLab() {
        $data=peminjamanInventarisLab::all();
        return view('mahasiswa.riwayatPeminjaman.riwayatpeminjamaninventaris', compact('data'));
   }

}