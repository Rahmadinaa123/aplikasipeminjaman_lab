<?php

namespace App\Http\Controllers;
use App\Models\peminjaman;

use Illuminate\Http\Request;

class KalabPeminjamanLabController extends Controller
{
    //halaman peminjaman lab
    public function index() {
        $data=peminjaman::all();
        return view('kalab.peminjaman_lab.index', compact('data'));
   }
}
