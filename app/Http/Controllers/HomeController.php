<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $books = Book::inRandomOrder()
                      ->where('stock', '>=', 1)
                      ->take(5)
                      ->get();

        return view('welcome', compact('books'));
    }

}
