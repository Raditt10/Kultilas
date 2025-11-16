<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement("ALTER TABLE dashboard_contents MODIFY COLUMN type ENUM('news', 'announcement', 'achievement', 'tip', 'event')");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement("ALTER TABLE dashboard_contents MODIFY COLUMN type ENUM('news', 'achievement', 'tip')");
    }
};
