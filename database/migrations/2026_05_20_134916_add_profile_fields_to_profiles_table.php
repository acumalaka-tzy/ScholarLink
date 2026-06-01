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
        Schema::table('profiles', function (Blueprint $table) {

            $table->text('bio')->nullable();

            $table->string('foto_profil')->nullable();

            $table->string('universitas')->nullable();

            $table->string('alamat')->nullable();

            $table->string('nomor_telepon')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {

            $table->dropColumn([
                'bio',
                'foto_profil',
                'universitas',
                'alamat',
                'nomor_telepon'
            ]);

        });
    }
};
