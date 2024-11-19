<?php

namespace App\Http\Controllers;
use App\Models\peminjamanInventarisLab;
use App\Models\User;
use Illuminate\Http\Request;

class PeminjamanInventarisController extends Controller
{
    //halaman Peminjaman Inventaris 
    public function index() {
        $data=peminjamanInventarisLab::all();
        return view('Laboran.peminjaman_inventaris.Index', compact('data'));
   }

    //halaman Peminjaman Inventaris Lab
    public function addPeminjamanInventaris() {
        $users=User::all();
        return view('Laboran.peminjaman_inventaris.tambahdata', compact('users'));
   }
}