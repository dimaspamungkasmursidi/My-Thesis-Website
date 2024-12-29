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
        'category_id',
        'author',
        'year',
        'stock',
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class); // Menambahkan relasi ke kategori
    }

    public static function searchWithLevenshtein($query)
    {
        $books = Book::all();
        $results = [];

        foreach ($books as $book) {
            $levTitle = levenshtein($query, $book->title);
            $levAuthor = levenshtein($query, $book->author);

            // Simpan hasil dengan skor Levenshtein
            $results[] = [
                'book' => $book,
                'lev_score' => min($levTitle, $levAuthor),
            ];
        }

        // Urutkan berdasarkan skor Levenshtein (skor kecil lebih relevan)
        usort($results, function ($a, $b) {
            return $a['lev_score'] <=> $b['lev_score'];
        });

        // Return hanya buku dengan skor threshold tertentu (contoh: <= 5)
        return collect(array_filter($results, function ($result) {
            return $result['lev_score'] <= 5;
        }));
    }

}
