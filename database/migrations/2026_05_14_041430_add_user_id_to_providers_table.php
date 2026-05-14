<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('providers', function (Blueprint $blueprint) {
            // Menambahkan user_id sebagai foreign key ke tabel users
            $blueprint->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('providers', function (Blueprint $blueprint) {
            $blueprint->dropForeign(['user_id']);
            $blueprint->dropColumn('user_id');
        });
    }
};