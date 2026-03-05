<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'menu_category_id',
        'name',
        'description',
        'price',
        'image',
        'is_signature',
        'is_popular',
        'is_premium',
        'available',
    ];

    public function category()
    {
        return $this->belongsTo(MenuCategory::class, 'menu_category_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
