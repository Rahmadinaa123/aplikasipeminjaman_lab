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
    $labs = ['Lab Testing', 'Lab Artificial Intelligence', 'Lab Jaringan Komputer', 'Lab Pemrograman Lanjut'];

    $query = JadwalLab::orderByRaw("FIELD(hari, 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu')")
                      ->orderBy('jam_mulai');
    
    if ($selectedLab) {
        $query->where('nama_lab', $selectedLab);
    }

    $jadwal = $query->get();

    return view('mahasiswa.jadwal', compact('jadwal', 'labs', 'selectedLab'));
}
}