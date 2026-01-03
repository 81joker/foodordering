<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cuisine extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }

    // public function food()
    // {
    //     return $this->hasMany(Food::class);
    // }
}
