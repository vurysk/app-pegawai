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
        Schema::table('attendance', function (Blueprint $table) {
            // Rename columns - lakukan satu per satu
            $table->renameColumn('status_absensi', 'status');
            $table->renameColumn('waktu_masuk', 'jam_masuk');
            $table->renameColumn('waktu_keluar', 'jam_keluar');
            
            // Update enum values untuk status (tambah 'late')
            $table->enum('status', ['present', 'late', 'sick', 'leave', 'absent'])->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('attendance', function (Blueprint $table) {
            // Kembalikan ke nama lama
            $table->renameColumn('status', 'status_absensi');
            $table->renameColumn('jam_masuk', 'waktu_masuk');
            $table->renameColumn('jam_keluar', 'waktu_keluar');
            
            // Kembalikan enum values
            $table->enum('status_absensi', ['present', 'leave', 'sick', 'absent'])->change();
        });
    }
};