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
        Schema::create('chat_rooms', function (Blueprint $table) {
            $table->id('id_room');

            $table->unsignedBigInteger('id_beasiswa');
            $table->unsignedBigInteger('dibuat_oleh');

            $table->string('nama_room');
            $table->string('tipe')->nullable();
            $table->timestamp('tanggal_dibuat')->useCurrent();

            $table->foreign('id_beasiswa')
                ->references('id_beasiswa')
                ->on('scholarships')
                ->onDelete('cascade');

            $table->foreign('dibuat_oleh')
                ->references('id_user')
                ->on('users')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_rooms');
    }
};
