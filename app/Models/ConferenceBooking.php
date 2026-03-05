<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConferenceBooking extends Model
{
    use HasFactory;

    protected $fillable = [
        'conference_room_id',
        'client_name',
        'phone',
        'email',
        'event_date',
        'attendees',
        'status',
        'notes'
    ];

    protected $dates = [
        'event_date'
    ];

    public function conferenceRoom()
    {
        return $this->belongsTo(ConferenceRoom::class);
    }
}
