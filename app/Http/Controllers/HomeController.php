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
        $books = Book::with('category');
        $categories = Category::all(); // Mengambil semua kategori
    
        // Cek apakah ada parameter 'category_id' dan nilainya tidak kosong
        if (request()->filled('category_id')) {
            $books->where('category_id', request('category_id'));
        }
    
        $books = $books->get();
    
        return view('allBook', compact('books', 'categories'));
    }

}
