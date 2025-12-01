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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id('id_pengguna');
            $table->string('username', 50)->unique();
            $table->string('password');
            $table->string('nama_lengkap', 100);
            $table->enum('role', ['admin', 'pembina', 'pelatih']);
            $table->timestamp('terakhir_login')->nullable();
            $table->string('remember_token', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
