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
        Schema::create('users', function (Blueprint $table) {
            $table->id();         
            $table->string('username');
            $table->string('nim')->unique;
            $table->string('prodi');
            $table->string('semester');
            $table->string('no_hp');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('nama_lab')->default('none');
            $table->string('level')->default('mahasiswa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};