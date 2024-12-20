<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'title',
        'description',
        'category',
        'author',
        'year',
        'stock',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
