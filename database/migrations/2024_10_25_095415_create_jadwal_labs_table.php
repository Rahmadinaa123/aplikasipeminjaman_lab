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
        Schema::create('jadwal_labs', function (Blueprint $table) {
            $table->id();
            $table->string('hari');
            $table->string('jam_mulai');
            $table->string('jam_selesai');
            $table->string('kelas');
            $table->string('prodi');
            $table->string('nama_lab');
            $table->string('mata_kuliah');
            $table->string('dosen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_labs');
    }
};