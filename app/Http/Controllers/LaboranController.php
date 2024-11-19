<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\peminjaman;
use App\Models\peminjamanInventarisLab;
use Illuminate\Http\Request;

class LaboranController extends Controller
{
    //halaman dashboard laboran
    public function index() {
        $user = User::count();
        $peminjaman = peminjaman::count();
        $peminjamanInventarisLab = peminjamanInventarisLab::count();
        $data=User::all();
        return view('Laboran.Index', compact('data','user','peminjaman','peminjamanInventarisLab'));
   }
    public function profil() {
        $data=User::all();
        return view('Laboran.profil', compact('data'));
   }
}