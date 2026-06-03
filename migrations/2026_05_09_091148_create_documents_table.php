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
        Schema::create('documents', function (Blueprint $table) {
            $table->id('id_dokumen');

            $table->unsignedBigInteger('id_application');

            $table->string('jenis_dokumen');
            $table->string('nama_file');
            $table->string('file_path');
            $table->timestamp('tanggal_upload')->useCurrent();

            $table->foreign('id_application')
                ->references('id_application')
                ->on('applications')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
