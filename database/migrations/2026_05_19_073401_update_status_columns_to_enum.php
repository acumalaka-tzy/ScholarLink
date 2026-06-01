<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        DB::statement("ALTER TABLE users MODIFY role ENUM('admin', 'provider', 'mahasiswa') NOT NULL DEFAULT 'mahasiswa'");
        DB::statement("ALTER TABLE users MODIFY status ENUM('aktif', 'nonaktif') NOT NULL DEFAULT 'aktif'");

        DB::statement("ALTER TABLE scholarships MODIFY status ENUM('aktif', 'nonaktif', 'ditutup') NOT NULL DEFAULT 'aktif'");

        DB::statement("ALTER TABLE applications MODIFY status ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending'");

        DB::statement("ALTER TABLE application_status_logs MODIFY status ENUM('pending', 'approved', 'rejected') NOT NULL DEFAULT 'pending'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE users MODIFY role VARCHAR(255) NOT NULL DEFAULT 'mahasiswa'");
        DB::statement("ALTER TABLE users MODIFY status VARCHAR(255) NOT NULL DEFAULT 'aktif'");

        DB::statement("ALTER TABLE scholarships MODIFY status VARCHAR(255) NOT NULL DEFAULT 'aktif'");

        DB::statement("ALTER TABLE applications MODIFY status VARCHAR(255) NOT NULL DEFAULT 'pending'");

        DB::statement("ALTER TABLE application_status_logs MODIFY status VARCHAR(255) NOT NULL DEFAULT 'pending'");
    }
};