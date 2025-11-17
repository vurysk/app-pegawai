<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

// class Attendance extends Model
// {
//     protected $table = 'attendance';
    
//     protected $fillable = [
//         'karyawan_id',
//         'tanggal',
//         'status',        // ← diubah dari 'status_absensi'
//         'jam_masuk',     // ← diubah dari 'waktu_masuk'  
//         'jam_keluar',    // ← diubah dari 'waktu_keluar'
//     ];

//     protected $casts = [
//         'tanggal' => 'date',
//     ];

//     public function employee()
//     {
//         return $this->belongsTo(Employee::class, 'karyawan_id');
//     }

//     // Accessor for status display
//     public function getStatusDisplayAttribute()
//     {
//         $statuses = [
//             'present' => 'Present',
//             'late' => 'Late',
//             'sick' => 'Sick',
//             'leave' => 'Leave',
//             'absent' => 'Absent',
//         ];

//         return $statuses[$this->status] ?? $this->status;
//     }

//     // Calculate working hours
//     public function getWorkingHoursAttribute(): ?string
//     {
//         if (!$this->jam_masuk || !$this->jam_keluar) {
//             return null;
//         }

//         $start = \Carbon\Carbon::parse($this->jam_masuk);
//         $end = \Carbon\Carbon::parse($this->jam_keluar);
        
//         return $end->diffInHours($start);
//     }
// }

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon; // <-- 1. TAMBAHKAN IMPORT CARBON

class Attendance extends Model
{
    protected $table = 'attendance';
    
    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'status',       // ← diubah dari 'status_absensi'
        'jam_masuk',    // ← diubah dari 'waktu_masuk'  
        'jam_keluar',   // ← diubah dari 'waktu_keluar'
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }

    // Accessor for status display
    public function getStatusDisplayAttribute()
    {
        $statuses = [
            'present' => 'Present',
            'late' => 'Late',
            'sick' => 'Sick',
            'leave' => 'Leave',
            'absent' => 'Absent',
        ];

        return $statuses[$this->status] ?? $this->status;
    }

    // 2. GANTI FUNGSI LAMA ANDA DENGAN YANG BARU INI
    /**
     * Accessor untuk menghitung jam kerja.
     * Akan dipanggil saat Anda mengakses $attendance->working_hours
     *
     * @return string|null
     */
    public function getWorkingHoursAttribute(): ?string
    {
        // Jika salah satu jam tidak ada, kembalikan null
        if (!$this->jam_masuk || !$this->jam_keluar) {
            return null;
        }

        try {
            // Gunakan Carbon yang sudah di-import
            $checkIn = Carbon::parse($this->jam_masuk);
            $checkOut = Carbon::parse($this->jam_keluar);

            // Hitung selisih dalam MENIT dan gunakan abs() agar nilainya selalu positif
            // Ini memperbaiki masalah "minus"
            $diffInMinutes = abs($checkOut->diffInMinutes($checkIn));

            // Ubah menit ke jam
            $hours = $diffInMinutes / 60;

            // Format angka menjadi 1 angka di belakang koma (desimal)
            // Ini memperbaiki masalah "desimal banyak"
            return number_format($hours, 1);

        } catch (\Exception $e) {
            // Tangani jika terjadi error saat parsing (misal data korup)
            return null;
        }
    }
}
