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

    Schema::create('scholarships', function (Blueprint $table) {
        $table->id('id_beasiswa');

        $table->unsignedBigInteger('id_provider');
        $table->unsignedBigInteger('id_kategori');

        $table->string('nama_beasiswa');
        $table->text('deskripsi');
        $table->text('syarat');
        $table->text('benefit');
        $table->string('tipe');
        $table->date('deadline');
        $table->date('tanggal_dibuat');
        $table->string('status');

        $table->foreign('id_provider')
            ->references('id_provider')
            ->on('providers')
            ->onDelete('cascade');

        $table->foreign('id_kategori')
            ->references('id_kategori')
            ->on('categories')
            ->onDelete('cascade');

        $table->enum('status', ['aktif', 'nonaktif', 'ditutup'])->default('aktif');

        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
