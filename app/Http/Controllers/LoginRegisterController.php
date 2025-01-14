<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class LoginRegisterController extends Controller
{
    public function register() {
        return view('Auth.register');
    }
    
    public function login() {
        return view('Auth.login');
    }

    public function postRegister(Request $request) {
        $request->validate([
            'username' => 'required',
            'nim' => 'required',
            'prodi' => 'required',
            'semester' => 'required',
            'no_hp' => 'required',
            'email' => 'required|email:dns',
            'password' => 'required|min:8|max:20',
        ]);
        
        $user = new User;
        $user->username = $request->username;
        $user->nim = $request->nim;
        $user->prodi = $request->prodi;
        $user->semester = $request->semester;
        $user->no_hp = $request->no_hp;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        if($user){
        return redirect('/login')->with('success', 'Akun berhasil dibuat, silahkan melakukan proses login!');
        } else {
        return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
        }
    }

    public function postLogin(Request $request) { 
    // Validasi input form
    $validatedData = $request->validate([
        'email' => 'required|email',   // Memeriksa format email
        'password' => 'required|min:8|max:20'  // Panjang password minimal 8 dan maksimal 20 karakter
    ]);
    // Tampilkan data yang sudah divalidasi dengan dd()
    //dd($validatedData);
    
    if(Auth::attempt($request->only('email', 'password'))) {
        $user = Auth::user();
        if ($user->level == 'mahasiswa') {
            return redirect('/mahasiswa/home');
        } elseif ($user->level == 'laboran') {
            return redirect('/laboran/home');
        } elseif ($user->level == 'ketua laboran') {
            return redirect('/kalab/home');
        } else {
        // Jika level tidak sesuai dengan 'pengguna' atau 'admin', logout pengguna
        Auth::logout();
        return redirect('/login')->with('error', 'Anda tidak memiliki akses.');
        }
    }
    return back()->with('failed', 'Maaf, terjadi kesalahan, coba kembali beberapa saat!');
}
public function logout() {
    Auth::logout();
    return redirect('/');
}

}