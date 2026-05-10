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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id('id_favorite');

            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_beasiswa');

            $table->foreign('id_user')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('id_beasiswa')
                ->references('id_beasiswa')
                ->on('scholarships')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('favorites');
    }
};
