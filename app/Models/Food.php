<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    // protected $fillable = ['name', 'price', 'cuisine_id', 'restaurant_id'];
    protected $fillable = [
        'restaurant_id',
        'cuisine_id',
        'name',
        'description',
        'price',
        'avg_rating',
        'total_orders',
        'is_available',
    ];

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function cuisine()
    {
        return $this->belongsTo(Cuisine::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
