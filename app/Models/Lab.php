<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    public function users()
    {
        return $this->belongsToMany(User::class, 'labs_booking', 'lab_id', 'user_id')->withTimestamps();
    }

    public function classSchedules()
    {
        return $this->hasMany(ClassSchedule::class);
    }
}
