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
    public function allBook(Request $request)
    {
        $categories = Category::all(); // Mengambil semua kategori
        $books = Book::query(); // Query awal untuk buku
    
        // Jika ada pencarian
        if ($request->has('q') && !empty($request->q)) {
            $searchTerm = strtolower($request->q);
    
            // Ambil semua buku untuk diproses dengan Levenshtein
            $books = $books->get()->filter(function ($book) use ($searchTerm) {
                $titleDistance = levenshtein(strtolower($book->title), $searchTerm);
                $authorDistance = levenshtein(strtolower($book->author), $searchTerm);
    
                // Ambang batas jarak karakter
                return $titleDistance <= 5 || $authorDistance <= 5;
            });
        } else {
            $books = $books->get(); // Jika tidak ada pencarian, ambil semua buku
        }
    
        return view('allBook', compact('categories', 'books'));
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
