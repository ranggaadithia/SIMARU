<?php

namespace App\Models;

use App\Utilities\TimeMappings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClassSchedule extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    public static $rules = [
        'lab_id' => 'required',
        'day' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        'subject' => 'required',
        'lecturer' => 'required',
        'class' => 'required',
    ];

    public function scopeIsTimeSlotAvailable($query, $lab_id, $day, $start_time_latter, $end_time_latter)
    {
        $start_time = TimeMappings::getMapping($start_time_latter)[0];
        $end_time = TimeMappings::getMapping($end_time_latter)[1];

        return $query->where('lab_id', $lab_id)
            ->where('day', $day)
            ->where(function ($query) use ($start_time, $end_time) {
                $query->where(function ($q) use ($start_time, $end_time) {
                    $q->where('start_time', '<=', $start_time)
                        ->where('end_time', '>=', $start_time);
                })
                    ->orWhere(function ($q) use ($start_time, $end_time) {
                        $q->where('start_time', '<=', $end_time)
                            ->where('end_time', '>=', $end_time);
                    });
            });
    }
}
