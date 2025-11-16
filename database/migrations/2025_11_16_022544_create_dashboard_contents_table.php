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
        Schema::create('dashboard_contents', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['news', 'announcement', 'achievement', 'tip', 'event']);
            $table->string('title');
            $table->text('content');
            $table->string('category')->nullable();
            $table->string('icon')->nullable();
            $table->string('author')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);
            $table->datetime('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard_contents');
    }
};
