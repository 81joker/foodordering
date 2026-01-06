<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'phone',
        'email',
        'cuisine_id',
        'avg_rating',
        'total_orders',
        'is_open',
    ];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function cuisines()
    {
        return $this->belongsToMany(Cuisine::class, 'cuisine_restaurant');
    }
}
// protected $fillable = [
//     'name', 'description', 'address', 'delivery_fee', 'avg_rating'
// ];
