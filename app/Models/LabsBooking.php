<?php

namespace App\Models;

use App\Utilities\TimeMappings;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LabsBooking extends Model
{
    use HasFactory;

    protected $table = 'labs_booking';

    protected $guarded = ['id'];

    // Di dalam model LabBooking
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function lab()
    {
        return $this->belongsTo(Lab::class, 'lab_id');
    }

    public function rescheduleRequests()
    {
        return $this->hasMany(RescheduleRequest::class, 'lab_booking_id');
    }

    public static $rules = [
        'lab_id' => 'required',
        'booking_date' => 'required',
        'start_time' => 'required',
        'end_time' => 'required',
        'reason_to_booking' => 'required'
    ];

    public function scopeIsBookingConflict($query, $lab_id, $booking_date, $start_time_latter, $end_time_latter)
    {
        $start_time = TimeMappings::getMapping($start_time_latter)[0];
        $end_time = TimeMappings::getMapping($end_time_latter)[1];

        return $query->where('lab_id', $lab_id)
            ->where('booking_date', $booking_date)
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
