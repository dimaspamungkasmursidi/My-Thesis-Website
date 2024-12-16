<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{

    public function index()
    {
        $books = Books::all();
        return view('admin.books.index', compact('books'));
    }

    public function create()
    {
        return view('admin.books.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|integer',
            'description' => 'required|string',
            'stock' => 'required|integer|min:0',
            'image' =>'required|image|mimes:jpeg,png,jpg, gif|max:2048'
        ]);

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('books', 'public');
        }

        try {
        $book = Books::create([
            'title' => $request->title,
            'author' => $request->author,
            'category' => $request->category,
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
        $book = Books::findOrFail($id);
        return view('bookDetail', compact('book'));
    }

    public function edit(string $id)
    {
        $book  = Books::findOrFail($id);
        return view('admin.books.edit', compact('book'));
    }

    public function update(Request $request, string $id)
    {
        $book = Books::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'author' => 'required|string|max:255',
            'category' => 'required|string|max:255',
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
        $book->category = $request->category;
        $book->year = $request->year;
        $book->description = $request->description;
        $book->stock = $request->stock;

        $book->save();

        return redirect()->route('books.index')->with('success', 'Book updated successfully!');
    }

    public function destroy(string $id)
    {
        $book = Books::findOrFail($id);

        if ($book->image){
            unlink(storage_path('app/public/' . $book->image));
        }

        $book->delete();
        return redirect()->route('books.index')->with('success', 'Book deleted successfully');
    }
}
