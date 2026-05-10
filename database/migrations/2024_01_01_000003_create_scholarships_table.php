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
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('university');
            $table->string('location');
            $table->string('level')->default('s1'); // sma, d3, s1, s2, s3
            $table->string('field')->default('umum'); // bidang studi
            $table->decimal('benefit_amount', 15, 2)->nullable();
            $table->string('benefit_type')->default('penuh'); // penuh, sebagian, beasiswa hidup
            $table->date('deadline');
            $table->text('requirements')->nullable();
            $table->string('status')->default('active'); // active, closed, archived
            $table->integer('available_slots')->nullable();
            $table->string('image_url')->nullable();
            $table->boolean('is_featured')->default(false);
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
