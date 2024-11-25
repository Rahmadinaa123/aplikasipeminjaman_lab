<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\inventarisLab;
use Illuminate\Http\Request;

class InventarisLabController extends Controller
{
     //halaman Inventaris Lab
    public function index() {
        $data=inventarisLab::all();
        return view('Laboran.inventaris_Lab.Index', compact('data'));
   }
   
    //halaman Inventaris lab
    public function addInventarisLab() {
        $users=User::all();
        return view('Laboran.inventaris_lab.tambahdata', compact('users'));
   }

   public function postInventarisLab(Request $request) {
     $request->validate([
    'username' => 'required',              // Nama peminjam
    'id_user'=> 'required',               
    'nim' => 'required',
    'prodi' => 'required',
    'semester' => 'required|integer|min:1|max:14',
    'nama_lab' => 'required',
    'tanggal_mulai' => 'required|date',    // Tanggal mulai peminjaman
    'tanggal_selesai' => 'required|date',  // Tanggal selesai peminjaman
    'jam_mulai' => 'required|date_format:H:i',    // Jam mulai pemakaian
    'jam_selesai' => 'required|date_format:H:i',  // Jam selesai pemakaian
    'keperluan' => 'required',
    'status' => ''
    ]);

    //dd($request->all());
    
     $peminjaman_lab = new Peminjaman;

    // Mengambil data dari form
    $peminjaman_lab->id_user = $request->id_user; // Menambahkan id_user
    $peminjaman_lab->username = $request->username; // Menggunakan username sebagai nama peminjam
    $peminjaman_lab->nim = $request->nim;
    $peminjaman_lab->prodi = $request->prodi;
    $peminjaman_lab->semester = $request->semester;
    $peminjaman_lab->nama_lab = $request->nama_lab;
    $peminjaman_lab->tanggal_mulai = $request->tanggal_mulai;
    $peminjaman_lab->tanggal_selesai = $request->tanggal_selesai;
    $peminjaman_lab->jam_mulai = $request->jam_mulai;
    $peminjaman_lab->jam_selesai = $request->jam_selesai;
    $peminjaman_lab->keperluan = $request->keperluan;
    $peminjaman_lab->status = $request->status;

    // Menyimpan data ke database
    $peminjaman_lab->save();

    // Mengecek apakah proses simpan berhasil
    if ($peminjaman_lab) {
        return redirect('/laboran/peminjaman_lab')->with('success', 'Data berhasil disimpan!');
    } else {
        return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
    }

    }

}