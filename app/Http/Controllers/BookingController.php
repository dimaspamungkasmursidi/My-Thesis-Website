<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Booking;
use App\Models\Member;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['book', 'member'])->get();
        return view('bookings.index', compact(var_name: 'bookings'));
    }

    public function create($book_id)
    {
        $books = Book::findOrFail($book_id);
        $members = Member::all();

        return view('bookings.create', compact('books', 'members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            // 'member_id' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($request->quantity > $book->stock){
            return redirect()->back()->with('error', 'Insufficient stock.');
        }

        $booking = Booking::create([
           'book_id' => $request->book_id,
           'member_id' => auth()->guard('member')->user()->id,
           'quantity' => $request->quantity,
           'status' => 'pending',
           'booked_at' => now(),
           'stock' => $book->stock - $request->quantity,
        ]);
        
        $book->stock -= $request->quantity;
        $book->save();

        return redirect()->back()->with('success', 'Booking has been added. waiting for admin approval!');
    }

}
