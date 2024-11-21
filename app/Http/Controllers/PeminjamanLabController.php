<?php

namespace App\Http\Controllers;

use App\Models\peminjaman;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PeminjamanLabController extends Controller
{
     //halaman Peminjaman Lab
    public function index() {
        $data=peminjaman::all();
        return view('Laboran.peminjaman_Lab.Index', compact('data'));
   }
    //halaman Peminjaman Lab
    public function addPeminjaman() {
        $users=User::all();
        return view('Laboran.peminjaman_Lab.tambahdata', compact('users'));
   }
    public function postPeminjamanLab(Request $request) {
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

    public function editPeminjamanLab($id) {
        $data = peminjaman::find($id);
        return view('laboran.peminjaman_lab.edit', compact('data'));
    }
     public function postEditPeminjamanLab(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',              // Nama peminjam
            'id_user'=> 'required',               
            'nim' => 'required',
            'prodi' => 'required',
            'semester' => 'required',
            'nama_lab' => 'required',
            'tanggal_mulai' => 'required|date',    // Tanggal mulai peminjaman
            'tanggal_selesai' => 'required|date',  // Tanggal selesai peminjaman
            'jam_mulai' => 'required',    // Jam mulai pemakaian
            'jam_selesai' => 'required',  // Jam selesai pemakaian
            'keperluan' => 'required',
            'status' => 'required'
        ]);

        dd($request->all());

        $user = User::find($id);

        $user->username = $request->username;
        $user->nim = $request->nim;
        $user->prodi = $request->prodi;
        $user->semester = $request->semester;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        $user->nama_lab = $request->nama_lab;
        $user->level = $request->level;

        $user->save();


        if ($user) {
            return redirect('/laboran/user')->with('success', 'User berhasil diupdate!');
        } else {
            return back()->with('failed', 'User gagal diupdate!');
        }
    }
     public function detail($id) {
        $data = PeminjamanLab::find($id);
        return view('laboran.peminjaman_lab.detail', compact('data'));
    }

}