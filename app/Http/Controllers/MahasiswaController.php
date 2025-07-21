<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class MahasiswaController extends Controller
{
     public function index() {
        $data=User::all();
        return view('mahasiswa.index', compact('data'));
   }

   public function daftarLab() {
        return view('mahasiswa.daftarlab');
   }

   public function pinjamLab(Request $request)
{
    $labName = $request->query('lab'); // Menangkap parameter lab dari URL
    return view('mahasiswa.pinjamlab', compact('labName'));

}
   
   public function profil() {
        $data=User::all();
        return view('mahasiswa.profil.profil', compact('data'));
   }
    public function jadwal() {
        $data=User::all();
        return view('mahasiswa.jadwal', compact('data'));
   }
    public function riwayat() {
        $data=User::all();
        return view('mahasiswa.riwayat', compact('data'));
   }

   public function ceklab() {
        return view('mahasiswa.cekketersediaanlab');
   }
}