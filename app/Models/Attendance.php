<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;


class Attendance extends Model
{
    protected $table = 'attendance';
    
    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'status',       
        'jam_masuk',    
        'jam_keluar',   
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'karyawan_id');
    }

   
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

    

    public function getWorkingHoursAttribute(): ?string
    {
        
        if (!$this->jam_masuk || !$this->jam_keluar) {
            return null;
        }

        try {
            
            $checkIn = Carbon::parse($this->jam_masuk);
            $checkOut = Carbon::parse($this->jam_keluar);

           
            $diffInMinutes = abs($checkOut->diffInMinutes($checkIn));

            
            $hours = $diffInMinutes / 60;

            
            return number_format($hours, 1);

        } catch (\Exception $e) {
            return null;
        }
    }
}
