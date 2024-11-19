<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class MahasiswaController extends Controller
{
     public function index() {
        $data=User::all();
        return view('Mahasiswa.Index', compact('data'));
   }

   public function daftarLab() {
        return view('Mahasiswa.daftarlab');
   }

   public function pinjamLab(Request $request)
{
    $labName = $request->query('lab'); // Menangkap parameter lab dari URL
    return view('mahasiswa.pinjamLab', compact('labName'));
}
   
   public function profil() {
        $data=User::all();
        return view('Mahasiswa.profil', compact('data'));
   }
    public function jadwal() {
        $data=User::all();
        return view('Mahasiswa.jadwal', compact('data'));
   }
    public function riwayat() {
        $data=User::all();
        return view('Mahasiswa.riwayat', compact('data'));
   }
}