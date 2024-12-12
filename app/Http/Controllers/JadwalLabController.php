<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\jadwalLab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class JadwalLabController extends Controller
{
     //halaman Jadwal Laboratorium
    public function index() {
        $data=jadwalLab::all();
        return view('Laboran.jadwal_lab.Index', compact('data'));
   }
   //halaman tambah data jadwal Lab
    public function addJadwalLab() {
        $users=User::all();
        return view('Laboran.jadwal_Lab.tambahdata', compact('users'));
   }

   public function mahasiswajadwal(Request $request) {
     $selectedLab = $request->input('lab'); // Get selected lab from request
    $labs = ['Lab Testing', 'Lab Artificial Intelligence', 'Lab Jaringan Komputer', 'Lab Pemrograman Lanjut', 'Lab Software Development'];

    $query = JadwalLab::orderByRaw("FIELD(hari, 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu')")
                      ->orderBy('jam_mulai');
    
    if ($selectedLab) {
        $query->where('nama_lab', $selectedLab);
    }

    $jadwal = $query->get();

    return view('mahasiswa.jadwal', compact('jadwal', 'labs', 'selectedLab'));
}

public function postJadwalLab(Request $request)
{
    $request->validate([
        'hari' => 'required|string',              
        'jam_mulai' => 'required|date_format:H:i', 
        'jam_selesai' => 'required|date_format:H:i', 
        'kelas' => 'required|string',             
        'prodi' => 'required|string',             
        'nama_lab' => 'required|string',          
        'mata_kuliah' => 'required|string',       
        'dosen' => 'required|string',             
    ]);

    // Membuat instance baru dari model JadwalLab
    $jadwal_lab = new JadwalLab;

    // Mengisi data berdasarkan input dari form
    $jadwal_lab->hari = $request->hari;
    $jadwal_lab->jam_mulai = $request->jam_mulai;
    $jadwal_lab->jam_selesai = $request->jam_selesai;
    $jadwal_lab->kelas = $request->kelas;
    $jadwal_lab->prodi = $request->prodi;
    $jadwal_lab->nama_lab = $request->nama_lab; // Diambil dari Auth::user()->nama_lab
    $jadwal_lab->mata_kuliah = $request->mata_kuliah;
    $jadwal_lab->dosen = $request->dosen;

    // Menyimpan data ke database
    $jadwal_lab->save();

    // Mengecek apakah proses simpan berhasil
    if ($jadwal_lab) {
        return redirect()->route('laboran.jadwal_lab')->with('success', 'Jadwal berhasil ditambahkan!');
    } else {
        return back()->with('failed', 'Terjadi kesalahan, coba lagi nanti.');
    }
}

public function editJadwalLab($id) {
    $data = JadwalLab::find($id);
    return view('laboran.jadwal_lab.edit', compact('data'));
}

public function postEditJadwalLab(Request $request, $id)
{
    // Validasi input
    $request->validate([
        'hari' => 'required|string',               // Hari
        'jam_mulai' => 'required|date_format:H:i', // Jam mulai (format HH:mm)
        'jam_selesai' => 'required|date_format:H:i|after:jam_mulai', // Jam selesai (harus setelah jam mulai)
        'kelas' => 'required|string',             // Kelas
        'prodi' => 'required|string',             // Program Studi
        'nama_lab' => 'required|string',          // Nama Lab
        'mata_kuliah' => 'required|string',       // Mata Kuliah
        'dosen' => 'required|string',             // Nama Dosen
    ]);

    // Mencari data jadwal berdasarkan ID
    $jadwal_lab = JadwalLab::find($id);

    if (!$jadwal_lab) {
        return back()->with('failed', 'Data jadwal tidak ditemukan!');
    }

    // Memperbarui data jadwal
    $jadwal_lab->hari = $request->hari;
    $jadwal_lab->jam_mulai = $request->jam_mulai;
    $jadwal_lab->jam_selesai = $request->jam_selesai;
    $jadwal_lab->kelas = $request->kelas;
    $jadwal_lab->prodi = $request->prodi;
    $jadwal_lab->nama_lab = $request->nama_lab;
    $jadwal_lab->mata_kuliah = $request->mata_kuliah;
    $jadwal_lab->dosen = $request->dosen;

    // Menyimpan perubahan ke database
    $jadwal_lab->save();

    // Mengecek apakah proses simpan berhasil
    if ($jadwal_lab) {
        return redirect()->route('laboran.jadwal_lab')->with('success', 'Data jadwal berhasil diperbarui!');
    } else {
        return back()->with('failed', 'Terjadi kesalahan, data jadwal gagal diperbarui!');
    }
}

public function deleteJadwalLab($id)
    {
        $jadwal_lab = JadwalLab::find($id);
        $jadwal_lab->delete();
        if ($jadwal_lab) {
            return back()->with('success', 'Data Jadwal Lab berhasil di hapus!');
        } else {
            return back()->with('failed', 'Gagal menghapus data Jadwal Lab!');
        }
    }

}