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
      Schema::create('admin_logs', function (Blueprint $table) {
            $table->id('id_log');

            $table->unsignedBigInteger('id_admin');

            $table->text('aktivitas');
            $table->text('keterangan')->nullable();
            $table->timestamp('waktu')->useCurrent();

            $table->foreign('id_admin')
                ->references('id')
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
        Schema::dropIfExists('admin_logs');
    }
};
