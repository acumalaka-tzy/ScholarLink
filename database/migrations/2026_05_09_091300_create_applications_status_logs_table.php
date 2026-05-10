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
        Schema::create('application_status_log', function (Blueprint $table) {
            $table->id('id_log');

            $table->unsignedBigInteger('id_application');

            $table->string('status');
            $table->text('catatan')->nullable();
            $table->timestamp('waktu')->useCurrent();

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
        Schema::dropIfExists('applications_status_logs');
    }
};
