<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class ProfilMahasiswaController extends Controller
{
    public function profil() {
        $data=User::all();
        return view('Mahasiswa.profil.profil', compact('data'));
   }

   public function editprofil() {
        $data=User::all();
        return view('Mahasiswa.profil.editprofil', compact('data'));
   }
}