<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    // The table name is optional if it follows Laravel conventions
    protected $table = 'team_members';

    // Mass assignable attributes
    protected $fillable = [
        'name',
        'image',
        'gender',
        'role',
        'joined_on',
        'bio',
        'status',
    ];

    // Optional: cast joined_on to date
    protected $casts = [
        'joined_on' => 'date',
    ];
}
