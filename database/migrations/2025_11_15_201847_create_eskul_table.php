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
        Schema::create('eskul', function (Blueprint $table) {
            $table->id('id_eskul');
            $table->string('nama_eskul', 100);
            $table->text('deskripsi')->nullable();
            $table->string('pembina', 100)->nullable();
            $table->string('hari_kegiatan', 50)->nullable();
            $table->time('jam_mulai')->nullable();
            $table->time('jam_selesai')->nullable();
            $table->string('lokasi', 100)->nullable();
            $table->integer('kuota')->nullable();
            $table->string('foto_eskul')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eskul');
    }
};
