<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();
        return view('admin.books.index', compact('books'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.books.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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
        
        return redirect()->route('admin.books.index')->with('success', 'Book created successfully!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create book: ' . $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $book = Books::find($id);
        // return view('books.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book  = Books::findOrFail($id);
        return view('admin.books.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
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
        ]);

        $book->update($request->all());
        return redirect()->route('admin.books.index')->with('success', 'Book updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = Books::findOrFail($id);
        $book->delete();
        return redirect()->route('admin.books.index')->with('success', 'Book deleted successfully!');
    }
}
