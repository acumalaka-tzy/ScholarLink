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
    Schema::create('providers', function (Blueprint $table) {
        $table->id('id_provider');
        $table->string('nama_instansi');
        $table->text('deskripsi_instansi')->nullable();
        $table->string('website')->nullable();
        $table->string('email_kontak')->nullable();
        $table->string('no_hp')->nullable();
        $table->text('alamat')->nullable();
        $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
