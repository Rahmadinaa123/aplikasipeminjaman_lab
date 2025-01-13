<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\inventarisLab;
use App\Models\peminjaman;
use App\Models\peminjamanInventarisLab;
use App\Models\jadwalLab;
use Illuminate\Support\Facades\Auth;

class KalabController extends Controller
{
    
    public function index() {
        $user = User::where('nama_lab', Auth::user()->nama_lab)->count();
        $peminjaman = peminjaman::where('nama_lab', Auth::user()->nama_lab)->count();
        $peminjamanPending = Peminjaman::where([
            ['nama_lab', '=', Auth::user()->nama_lab],
            ['status', '=', 'pending']
        ])->count();
        $peminjamanInventarisLab = peminjamanInventarisLab::where('nama_lab', Auth::user()->nama_lab)->count();
        $jadwal = jadwalLab::where('nama_lab', Auth::user()->nama_lab)->count();
        $inventaris = inventarisLab::where('nama_lab', Auth::user()->nama_lab)->count();
        $data=User::all();
        $laporan = Peminjaman::where([
            ['nama_lab', '=', Auth::user()->nama_lab],
            ['status', '=', 'selesai'],
        ])->count();
        return view('Kalab.index', compact('data','user','peminjaman','peminjamanInventarisLab','laporan','jadwal','inventaris','peminjamanPending'));
   }
    public function profil() {
        $data=User::all();
        return view('Kalab.profil', compact('data'));
   }
    
   }