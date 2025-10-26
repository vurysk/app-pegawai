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
        // Hapus kolom lama
        Schema::table('attendance', function (Blueprint $table) {
            $table->dropColumn('status_absensi');
        });

        // Tambah ulang kolom dengan enum baru
        Schema::table('attendance', function (Blueprint $table) {
            $table->enum('status_absensi', ['present', 'leave', 'sick', 'absent'])->after('waktu_keluar');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Balik ke enum lama (Bahasa Indonesia)
        Schema::table('attendance', function (Blueprint $table) {
            $table->dropColumn('status_absensi');
        });

        Schema::table('attendance', function (Blueprint $table) {
            $table->enum('status_absensi', ['hadir', 'izin', 'sakit', 'alpha'])->after('waktu_keluar');
        });
    }
};
