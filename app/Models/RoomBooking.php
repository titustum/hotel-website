<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'notes',
    ];

    protected $dates = [
        'check_in',
        'check_out',
    ];

    protected $casts = [
        'check_in' => 'date',
        'check_out' => 'date',
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
