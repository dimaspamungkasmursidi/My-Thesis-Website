<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class BookController extends Controller
{


    public function index(Request $request)
    {
        $categories = Category::all();
        $books = Book::with('category')->get(); // Ambil semua buku untuk perhitungan
    
        // Pencarian menggunakan Levenshtein
        if ($request->has('search') && !empty($request->search)) {
            $searchTerm = strtolower($request->search);
            
            // Filter buku dengan Levenshtein Distance
            $books = $books->filter(function ($book) use ($searchTerm) {
                $titleDistance = levenshtein(strtolower($book->title), $searchTerm);
                $authorDistance = levenshtein(strtolower($book->author), $searchTerm);
    
                // Ambil hanya yang memiliki jarak di bawah ambang batas (misalnya 5 karakter)
                return $titleDistance <= 5 || $authorDistance <= 5;
            });
        }
    
        return view('admin.books.index', compact('books', 'categories'));
    }    

    public function create()
    {
        $categories = Category::all(); // Mengambil semua kategori
        return view('admin.books.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // Validasi untuk kategori_id
            'year' => 'required|integer',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'image' =>'required|image|mimes:jpeg,png,jpg, gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
        }

        try {
        $book = Book::create([
            'title' => $request->title,
            'author' => $request->author,
            'category_id' => $request->category_id, // Simpan ID kategori
            'year' => $request->year,
            'description' => $request->description,
            'stock' => $request->stock,
            'image' => $imagePath,
        ]);

        return redirect()->route('books.index')->with('success', 'Book created successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create book: ' . $e->getMessage()]);
        }
    }

    public function show(string $id)
    {
        $book = Book::findOrFail($id);
        return view('bookDetail', compact('book'));
    }

    public function edit(string $id)
    {
        $book = Book::findOrFail($id); // Mengambil data buku berdasarkan ID
        $categories = Category::all(); // Mengambil semua kategori
        return view('admin.books.edit', compact('book', 'categories'));
    }


    public function update(Request $request, string $id)
    {
        $book = Book::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id', // Validasi kategori_id
            'year' => 'required|integer',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg, gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($book->image){
                unlink(storage_path('app/public/' . $book->image));
            }
            $imagePath = $request->file('image')->store('books', 'public');
            $book->image = $imagePath;
        }

        $book->title = $request->title;
        $book->author = $request->author;
        $book->category_id = $request->category_id; // Update kategori_id
        $book->year = $request->year;
        $book->description = $request->description;
        $book->stock = $request->stock;

        $book->save();

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(string $id)
    {
        $book = Book::findOrFail($id);

        if ($book->image){
            unlink(storage_path('app/public/' . $book->image));
        }

        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
