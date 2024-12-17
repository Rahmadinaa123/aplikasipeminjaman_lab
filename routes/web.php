<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LaboranController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeminjamanLabController;
use App\Http\Controllers\MahasiswaPeminjamanLabController;
use App\Http\Controllers\MahasiswaPeminjamanInventarisLabController;
use App\Http\Controllers\InventarisLabController;
use App\Http\Controllers\PeminjamanInventarisController;
use App\Http\Controllers\JadwalLabController;
use App\Http\Controllers\LaporanAkhirController;
use App\Http\Controllers\LoginRegisterController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KalabController;
use App\Http\Controllers\KalabPeminjamanLabController;
use App\Http\Controllers\KalabInventarisLabController;
use App\Http\Controllers\KalabJadwalLabController;
use App\Http\Controllers\KalabPeminjamanInventarisController;
use App\Http\Controllers\ProfilMahasiswaController;

Route::get('/', function () {
    return view('index');
});
Route::get('/logout', [LoginRegisterController::class, 'logout'])->name('logout');


Route::middleware(['guest'])->group(function () {
    Route::post('/postRegister', [LoginRegisterController::class, 'postRegister'])->name('postRegister');
    Route::post('/postLogin', [LoginRegisterController::class, 'postLogin'])->name('postLogin');
    Route::get('/registrasi', [LoginRegisterController::class, 'register'])->name('auth.register');
    Route::get('/login', [LoginRegisterController::class, 'login'])->name('auth.login');
});

Route::group(['middleware' => ['auth', 'checklevel:laboran']], function () {
   Route::get('laboran/home', [LaboranController::class, 'index'])->name('laboran.home');
   Route::get('laboran/profil', [LaboranController::class, 'profil'])->name('laboran.profil');
   //user
   Route::get('laboran/user', [UserController::class, 'index'])->name('laboran.user');
   Route::get('laboran/user/tambah', [UserController::class, 'addUser'])->name('laboran.user.tambah');
   Route::post('/postUser', [UserController::class, 'postUser'])->name('laboran.postUser');
   Route::get('laboran/user/edit/{id}', [UserController::class, 'updateUser'])->name('laboran.user.edit');
   Route::get('/editUser/{id}', [UserController::class, 'editUser'])->name('editUser');
   Route::post('/postEditUser/{id}', [UserController::class, 'postEditUser'])->name('postEditUser');
   Route::get('/laboran/user/detail/{id}', [UserController::class, 'detail'])->name('laboran.user.detail');
   Route::get('/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');
   
   //peminjaman lab
   Route::get('laboran/peminjaman_lab', [PeminjamanLabController::class, 'index'])->name('laboran.peminjaman_lab');
   Route::get('laboran/peminjaman_lab/tambah', [PeminjamanLabController::class, 'addPeminjaman'])->name('laboran.peminjaman_lab.tambah');
   Route::post('laboran/postPeminjamanLab', [PeminjamanLabController::class, 'postPeminjamanLab'])->name('laboran.postpeminjamanLab');
   Route::get('laboran/peminjaman_lab/edit/{id}', [PeminjamanLabController::class, 'updatePeminjamanLab'])->name('laboran.PeminjamanLab.edit');
   Route::get('/editPeminjamanLab/{id}', [PeminjamanLabController::class, 'editPeminjamanLab'])->name('editPeminjamanLab');
   Route::post('/postEditPeminjamanLab/{id}', [PeminjamanLabController::class, 'postEditPeminjamanLab'])->name('postEditPeminjamanLab');
   Route::get('laboran/peminjaman_lab/detail/{id}', [PeminjamanLabController::class, 'detail'])->name('laboran.peminjaman_lab.detail');
   Route::get('/deletePeminjamanLab/{id}', [PeminjamanLabController::class, 'deletePeminjamanLab'])->name('deletePeminjamanLab');
   
   //inventarislab 
   Route::get('laboran/inventaris_lab', [InventarisLabController::class, 'index'])->name('laboran.inventaris_lab');
   Route::get('laboran/inventaris_lab/tambah', [InventarisLabController::class, 'addInventarisLab'])->name('laboran.inventaris_lab.tambah');
   Route::post('/postinventaris_lab', [InventarisLabController::class, 'postInventarisLab'])->name('laboran.postinventaris_lab');
   Route::get('laboran/inventaris_lab/editInventarisLab/{id}', [InventarisLabController::class, 'editInventarisLab'])->name('editInventarisLab');
   Route::put('/postEditInventarisLab/{id}', [InventarisLabController::class, 'postEditInventarisLab'])->name('postEditInventarisLab');
   Route::get('laboran/inventaris_lab/detail/{id}', [InventarisLabController::class, 'detail'])->name('laboran.peminjaman_lab.detail');
   Route::get('/deleteInventarisLab/{id}', [InventarisLabController::class, 'deleteInventarisLab'])->name('deleteInventarisLab');
   
   
   //peminjaman inventaris
   Route::get('laboran/peminjaman_inventaris', [PeminjamanInventarisController::class, 'index'])->name('laboran.peminjaman_inventaris');
   Route::get('laboran/peminjaman_inventaris/tambah', [PeminjamanInventarisController::class, 'addPeminjamanInventaris'])->name('laboran.peminjaman_inventaris.tambah');
   Route::post('/postpeminjaman_inventaris', [PeminjamanInventarisController::class, 'postPeminjamanInventaris'])->name('laboran.postpeminjaman_inventaris');
   Route::get('laboran/peminjaman_inventaris/edit/{id}', [PeminjamanInventarisController::class, 'editPeminjamanInventaris'])->name('editPeminjamanInventaris');
   Route::put('/postEditPeminjaman/iventaris/{id}', [PeminjamanInventarisController::class, 'postEditPeminjamanInventaris'])->name('postEditPeminjamanInventaris');
   Route::get('laboran/peminjaman_inventaris/detail/{id}', [PeminjamanInventarisController::class, 'detail'])->name('laboran.peminjaman_inventaris.detail');
   Route::get('/deletePeminjamanInventarisLab/{id}', [PeminjamanInventarisController::class, 'deletePeminjamanInventaris'])->name('deletePeminjamanInventaris');
   
   //jadwal lab
   Route::get('laboran/jadwal_lab', [JadwalLabController::class, 'index'])->name('laboran.jadwal_lab');
   Route::get('laboran/jadwal_lab/tambah', [JadwalLabController::class, 'addJadwalLab'])->name('laboran.jadwal_lab.tambah');
   Route::post('/postjadwal_lab', [JadwalLabController::class, 'postJadwalLab'])->name('laboran.postjadwal_lab');
   Route::get('laboran/jadwal_lab/editJadwalLab/{id}', [JadwalLabController::class, 'editJadwalLab'])->name('editJadwalLab');
   Route::put('/postEditJadwalLab/{id}', [JadwalLabController::class, 'postEditJadwalLab'])->name('postEditJadwalLab');
   Route::get('/deleteJadwalLab/{id}', [JadwalLabController::class, 'deleteJadwalLab'])->name('deleteJadwalLab');

   //laporan akhir
   Route::get('laboran/laporan_akhir', [LaporanAkhirController::class, 'index'])->name('laboran.laporan_akhir');
   Route::get('laboran/laporan_akhir/inventaris', [LaporanAkhirController::class, 'inventaris'])->name('laboran.laporan_akhir.invetaris'); 
   Route::get('laboran/laporan_akhir/detail/{id}', [LaporanAkhirController::class, 'detail'])->name('laboran.laporan_akhir.detail');
   Route::get('laboran/laporan_akhir/laporanpeminjamanlab/cetak', [LaporanAkhirController::class, 'cetaklaporanpeminjamanlab'])->name('laboran.cetak.laporan_akhir');
   Route::get('laboran/laporan_akhir/laporanpeminjamaninventaris/cetak', [LaporanAkhirController::class, 'cetaklaporanpeminjamaninventaris'])->name('laboran.cetak.laporan_akhir');
   
});

   Route::group(['middleware' => ['auth', 'checklevel:mahasiswa']], function () {
   Route::get('mahasiswa/home', [MahasiswaController::class, 'index'])->name('mahasiswa.home');
   Route::get('mahasiswa/daftarLab', [MahasiswaController::class, 'daftarLab'])->name('mahasiswa.daftarLab');
   Route::get('mahasiswa/jadwal', [jadwalLabController::class, 'mahasiswajadwal'])->name('mahasiswa.jadwal');

   //peminjaman lab
   Route::get('mahasiswa/pinjamLab', [MahasiswaController::class, 'pinjamLab'])->name('mahasiswa.pinjamLab');
   Route::post('/postPeminjamanLab', [MahasiswaPeminjamanLabController::class, 'postPeminjamanLab'])->name('mahasiswa.postPeminjamanLab');
   Route::get('mahasiswa/riwayatPeminjamanLab', [MahasiswaPeminjamanLabController::class, 'riwayatpeminjamanLab'])->name('mahasiswa.riwayatPeminjamanLab');

   //peminjaman Inventaris lab
   Route::get('mahasiswa/pinjaminventaris', [MahasiswaPeminjamanInventarisLabController::class, 'index'])->name('mahasiswa.pinjamaninventaris');
   Route::post('/postPeminjamanInventarisLab', [MahasiswaPeminjamanInventarisLabController::class, 'postPeminjamanInventarisLab'])->name('mahasiswa.postPeminjamanInventarisLab');
   Route::get('mahasiswa/riwayatPeminjamaninventarisLab', [MahasiswaPeminjamanInventarisLabController::class, 'riwayatpeminjamanInventarisLab'])->name('mahasiswa.riwayatPeminjamanInventarisLab');
   
   //profil
   Route::get('mahasiswa/profil', [ProfilMahasiswaController::class, 'profil'])->name('mahasiswa.profil');
   Route::get('mahasiswa/profil/edit', [ProfilMahasiswaController::class, 'editprofil'])->name('mahasiswa.profil.edit');
   Route::put('/postUpdateProfilMahasiswa', [ProfilMahasiswaController::class, 'postUpdateProfil'])->name('mahasiswa.updateProfil');
   
   
});

   Route::group(['middleware' => ['auth', 'checklevel:ketua laboran']], function () {
   Route::get('kalab/home', [kalabController::class, 'index'])->name('kalab.home');
   Route::get('kalab/profil', [KalabController::class, 'profil'])->name('kalab.profil');

   //peminjaman lab
   Route::get('kalab/peminjaman_lab', [KalabPeminjamanLabController::class, 'index'])->name('kalab.peminjaman_lab');
   Route::get('kalab/peminjaman_lab/detail/{id}', [KalabPeminjamanLabController::class, 'detail'])->name('kalab.peminjaman_lab.detail');

  //inventarislab 
   Route::get('kalab/inventaris_lab', [KalabInventarisLabController::class, 'index'])->name('kalab.inventaris_lab');
   Route::get('kalab/inventaris_lab/detail/{id}', [KalabInventarisLabController::class, 'detail'])->name('kalab.inventaris_lab.detail');

   //jadwal lab
   Route::get('kalab/jadwal_lab', [KalabJadwalLabController::class, 'index'])->name('kalab.jadwal_lab');

   //peminjaman inventaris
   Route::get('kalab/peminjaman_inventaris', [KalabPeminjamanInventarisController::class, 'index'])->name('kalab.peminjaman_inventaris');
   Route::get('kalab/peminjaman_inventaris/detail/{id}', [KalabPeminjamanInventarisController::class, 'detail'])->name('kalab.peminjaman_inventaris.detail');
});

// Route::get('/registrasi', [LoginRegisterController::class, 'register'])->name('auth.register');
// Route::get('login', [LoginRegisterController::class, 'login'])->name('auth.login');