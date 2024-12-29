<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Category;

class HomeController extends Controller
{
    // Home Page
    public function index()
    {
        $books = Book::inRandomOrder()
                      ->where('stock', '>=', 1)
                      ->take(6)
                      ->get();

        $newBook = Book::where('stock', '>=', 1)->orderBy('created_at', 'desc')->first();

        return view('welcome', compact('books', 'newBook'));
    }

    // All Books Page
    public function allBook()
    {
        $categories = Category::all();
        $search = request('q', '');
        $books = collect();

        if (!empty($search)) {
            // Full-Text Search
            $books = Book::query()
                ->whereRaw("MATCH(title, author) AGAINST(? IN BOOLEAN MODE)", [$search])
                ->get();

            // Jika tidak ada hasil, gunakan Levenshtein
            if ($books->isEmpty()) {
                $levResults = Book::searchWithLevenshtein($search);

                // Extract buku dari hasil Levenshtein
                $books = $levResults->pluck('book');
            }
        } else {
            // Jika tidak mencari, ambil semua buku
            $books = Book::with('category')->get();
        }

        return view('allBook', compact('books', 'categories'));
    }

}
