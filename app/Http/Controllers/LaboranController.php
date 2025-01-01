<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\peminjaman;
use App\Models\peminjamanInventarisLab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaboranController extends Controller
{
    //halaman dashboard laboran
    public function index() {
        $user = User::where('nama_lab', Auth::user()->nama_lab)->count();
        $peminjaman = peminjaman::where('nama_lab', Auth::user()->nama_lab)->count();
        $peminjamanPending = Peminjaman::where([
            ['nama_lab', '=', Auth::user()->nama_lab],
            ['status', '=', 'pending']
        ])->count();
        $peminjamanInventarisLab = peminjamanInventarisLab::where('nama_lab', Auth::user()->nama_lab)->count();
        $data=User::all();
        $laporan = Peminjaman::where([
            ['nama_lab', '=', Auth::user()->nama_lab],
            ['status', '=', 'selesai'],
        ])->count();

        return view('Laboran.Index', compact('data','user','peminjaman','peminjamanInventarisLab','laporan', 'peminjamanPending'));
   }
    public function profil() {
        $data=User::all();
        return view('Laboran.profil', compact('data'));
   }
}