<?php

namespace App\Http\Controllers;
use App\Models\peminjaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KalabPeminjamanLabController extends Controller
{
    //halaman peminjaman lab
    public function index() {
        $data=peminjaman::all();
        $peminjamanPending = Peminjaman::where([
            ['nama_lab', '=', Auth::user()->nama_lab],
            ['status', '=', 'pending']
        ])->count();
        return view('Kalab.peminjaman_lab.index', compact('data','peminjamanPending'));
   }

   public function detail($id) {
        $data = peminjaman::find($id);
        return view('Kalab.peminjaman_lab.detail', compact('data'));
    }
     public function editPeminjamanLab($id) {
        $data = peminjaman::find($id);
        return view('Kalab.peminjaman_lab.edit', compact('data'));
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

        //dd($request->all());

        $peminjaman_lab = peminjaman::find($id);

        $peminjaman_lab->username = $request->username;
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

        $peminjaman_lab->save();

        // Mengecek apakah proses simpan berhasil
    if ($peminjaman_lab) {
        return redirect('/Kalab/peminjaman_lab')->with('success', 'Data berhasil disimpan!');
    } else {
        return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
    }

}

}