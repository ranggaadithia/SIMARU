<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function users()
    {
        return $this->belongsToMany(User::class, 'labs_booking', 'lab_id', 'user_id')
            ->withTimestamps()
            ->withPivot('reason_to_booking', 'booking_date', 'start_time', 'end_time');
    }

    public function classSchedules()
    {
        return $this->hasMany(ClassSchedule::class);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
