<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'book_id',
        'user_id',
        'quantity',
        'booked_at',
    ];

    public function book()
    {
        return $this->belongsTo(Books::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
