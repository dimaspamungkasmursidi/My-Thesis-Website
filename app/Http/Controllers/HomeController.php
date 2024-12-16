<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class HomeController extends Controller
{
    public function index()
    {
        $books = Books::inRandomOrder()
                      ->where('stock', '>=', 1)
                      ->take(5)
                      ->get();

        return view('welcome', compact('books'));
    }

}
