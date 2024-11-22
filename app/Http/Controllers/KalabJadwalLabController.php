<?php

namespace App\Http\Controllers;
use App\Models\jadwalLab;
use Illuminate\Http\Request;

class KalabJadwalLabController extends Controller
{
     //halaman Jadwal Laboratorium
    public function index() {
        $data=jadwalLab::all();
        return view('Kalab.jadwal_lab.Index', compact('data'));
}
}