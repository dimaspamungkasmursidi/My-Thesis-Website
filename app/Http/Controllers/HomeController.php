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

                      $newBook = Book::where('stock', '>', 0)
                      ->orderBy('created_at', 'desc')
                      ->take(10)
                      ->get();
                  
        return view('welcome', compact('books', 'newBook'));
    }

    // All Books Page
    public function allBook()
    {
        $categories = Category::all();
        $search = request('q', '');
        $books = collect();

        if (!empty($search)) {
            // Gunakan Levenshtein Distance untuk pencarian
            $levResults = Book::searchWithLevenshtein($search);
            $books = $levResults->pluck('book');  // Ambil objek Book dari hasil
        } else {
            // Jika tidak ada pencarian, tampilkan semua buku
            $books = Book::all();
        }

        return view('allBook', compact('books', 'categories'));
    }
    
    public function bookCategory($categoryId)
    {
        $categories = Category::all();
        $category = Category::findOrFail($categoryId);
        
        $search = request('q', '');
        $books = collect();
    
        if (!empty($search)) {
            // Gunakan Levenshtein Distance untuk pencarian berdasarkan kategori
            $levResults = Book::searchWithLevenshteinCategory($search, $categoryId);
            $books = $levResults->pluck('book');  // Ambil objek Book dari hasil
        } else {
            // Menampilkan buku berdasarkan kategori
            $books = Book::where('category_id', $categoryId)->get();
        }
    
        return view('bookCategory', compact('books', 'category', 'categories'));
    }
    

}
