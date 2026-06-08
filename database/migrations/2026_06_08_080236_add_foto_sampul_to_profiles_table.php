<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::table('profiles', function (Blueprint $table) {
        $table->string('foto_profil')->nullable()->change();
        $table->string('foto_sampul')->nullable()->after('foto_profil');
    });
}

public function down(): void
{
    Schema::table('profiles', function (Blueprint $table) {
        $table->dropColumn('foto_sampul');
    });
}
};
