<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    // Home Page
    public function index()
    {
        $books = Book::inRandomOrder()
                      ->where('stock', '>=', 1)
                      ->take(6)
                      ->get();

        return view('welcome', compact('books'));
    }

    // All Books Page
    public function allBook()
    {
        $books = Book::all();
        return view('allBook', compact('books'));
    }

}
