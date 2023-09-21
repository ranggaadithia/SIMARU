<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LabsBooking extends Model
{
    use HasFactory;

    protected $table = 'labs_booking';

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
}
