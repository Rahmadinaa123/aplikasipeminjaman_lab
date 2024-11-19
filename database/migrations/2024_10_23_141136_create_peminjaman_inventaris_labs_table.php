<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjaman_inventaris_labs', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('nim');
            $table->string('prodi');
            $table->string('semester');
            $table->string('nama_lab');
            $table->string('nama_barang');
            $table->unsignedBigInteger('id_user'); // Foreign key untuk user
            $table->date('tanggal_pinjam'); // Tanggal mulai peminjaman
            $table->date('tanggal_kembali'); // Tanggal selesai peminjaman
            $table->time('jam_pinjam');
            $table->time('jam_kembali');
            $table->string('keperluan');
            $table->string('status')->default('pending');
            $table->timestamps();
            
             // Foreign key constraint
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjaman_inventaris_labs');
    }
};