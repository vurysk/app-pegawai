<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'room_code',
        'floor',
        'department_id',
    ];

    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function employees(){
        return $this->hasMany(Employee::class, 'room_id');
    }
}

