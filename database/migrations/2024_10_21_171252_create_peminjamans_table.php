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
        Schema::create('peminjaman', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('nim');
            $table->string('prodi');
            $table->string('semester');
            $table->string('nama_lab')->default('none');
            $table->string('keperluan')->default('belajar');
            $table->unsignedBigInteger('id_user'); // Foreign key untuk user
            $table->date('tanggal_mulai'); // Tanggal mulai peminjaman
            $table->date('tanggal_selesai'); // Tanggal selesai peminjaman
            $table->time('jam_mulai');
            $table->time('jam_selesai');
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
        Schema::dropIfExists('peminjaman');
    }
};