<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfilMahasiswaController extends Controller
{
    public function profil() {
        $data=User::all();
        return view('Mahasiswa.profil.profil', compact('data'));
   }

   public function editprofil() {
        $data=User::all();
        return view('Mahasiswa.profil.editprofil', compact('data'));
   }
   public function postUpdateProfil(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'username' => 'required|string|max:255',
            'prodi' => 'required|string|max:255',
            'semester' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        // Dapatkan user yang sedang login
        $user = Auth::user();

        // Update data user berdasarkan input form
        $user->update([
            'username' => $request->username,
            'prodi' => $request->prodi,
            'semester' => $request->semester,
            'no_hp' => $request->no_hp,
            'email' => $request->email,
        ]);

        // Redirect kembali dengan pesan sukses
        return redirect()
            ->route('mahasiswa.profil')
            ->with('success', 'Profil berhasil diperbarui!');
    }
}