<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use App\Models\peminjamanInventarisLab;
use Illuminate\Http\Request;

class LaporanAkhirController extends Controller
{
    
    public function index() {
    // Ambil data peminjaman yang hanya memiliki status 'selesai'
    $data = peminjaman::where('status', 'selesai')->get();
    return view('Laboran.laporan_akhir.index', compact('data'));
}
 
    public function inventaris() {
    // Ambil data peminjaman yang hanya memiliki status 'selesai'
    $data = peminjamanInventarisLab::where('status', 'selesai')->get();
    return view('Laboran.laporan_akhir.laporanInventaris', compact('data'));
}
public function detail($id) {
        $data = peminjaman::find($id);
        return view('laboran.laporan_akhir.detail', compact('data'));
    }

}