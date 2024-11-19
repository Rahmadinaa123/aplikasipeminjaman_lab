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
        Schema::create('inventaris_labs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('nama_lab');
            $table->string('kode_barang')->unique();
            $table->string('kategori');
            $table->string('jumlah');
            $table->string('kondisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris_labs');
    }
};