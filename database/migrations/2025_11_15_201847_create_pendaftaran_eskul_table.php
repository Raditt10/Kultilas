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
        Schema::create('pendaftaran_eskul', function (Blueprint $table) {
            $table->id('id_pendaftaran');
            $table->unsignedBigInteger('id_siswa');
            $table->unsignedBigInteger('id_eskul');
            $table->date('tanggal_daftar');
            $table->enum('status', ['tunda', 'diterima', 'ditolak'])->default('tunda');
            $table->text('keterangan')->nullable();
            
            $table->foreign('id_siswa')->references('id_siswa')->on('siswa')->onDelete('cascade');
            $table->foreign('id_eskul')->references('id_eskul')->on('eskul')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_eskul');
    }
};
