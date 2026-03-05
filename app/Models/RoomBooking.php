<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomBooking extends Model
{
 use HasFactory;

    protected $fillable = [
        'room_id',
        'guest_name',
        'guest_phone',
        'guest_email',
        'check_in',
        'check_out',
        'total_price',
        'status',
        'notes'
    ];

    protected $dates = [
        'check_in',
        'check_out'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
