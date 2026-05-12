<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('application_status_logs', function (Blueprint $table) {

            $table->id('id_log');

            $table->unsignedBigInteger('id_application');

            $table->string('status');

            $table->text('catatan')->nullable();

            $table->timestamp('tanggal_status')
                  ->useCurrent();

            $table->timestamps();

            $table->foreign('id_application')
                ->references('id_application')
                ->on('applications')
                ->onDelete('cascade');

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('application_status_logs');
    }
};