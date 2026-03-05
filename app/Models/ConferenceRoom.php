<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConferenceRoom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'capacity',
        'price_per_day',
        'image'
    ];

    public function bookings()
    {
        return $this->hasMany(ConferenceBooking::class);
    }
}
