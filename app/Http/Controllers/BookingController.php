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

    public function create()
    {
        $books = Book::all();
        $members = Member::all();

        return view('bookings.create', compact('books', 'members'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required',
            'member_id' => 'required',
            'quantity' => 'required|integer|min:1',
        ]);

        $book = Book::findOrFail($request->book_id);

        if ($book->stock < $request->quantity) {
            return back()->withErrors(['error' => 'Not enough stock available for this book.']);
        }

        $book->stock -= $request->quantity;
        $book->save();

        $booking = $book->bookings()->create([
            'book_id' => $request->book_id,
            'member_id' => $request->member_id,
            'quantity' => $request->quantity,
            'booked_at' => now(),
            'stock' => $book->stock,
            'status' => Booking::STATUS_PENDING,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking created successfully!');
    }

    public function approve(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status !== Booking::STATUS_PENDING) {
            return redirect()->route('bookings.index')->with('error', 'Booking is not pending.');
        }

        $request->validate([
            'borrow_date' => 'required|date',
            'return_date' => 'required|date|after:borrow_date',
        ]);
        
        $booking->update([
            'status' => Booking::STATUS_APPROVED,
            'borrow_date' => $request->borrow_date,
            'return_date' => $request->return_date
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking approved successfully!');
    }

    public function reject(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status !== Booking::STATUS_PENDING) {
            return redirect()->route('bookings.index')->with('error', 'Booking is not pending.');
        }

        $book = $booking->book;
        $book->stock += $booking->quantity;
        $book->save();

        $booking->update([
            'status' => Booking::STATUS_REJECTED,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Booking rejected successfully!');
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);

        if ($booking->status !== Booking::STATUS_PENDING) {
            $book = $booking->book;
            $book->stock += $booking->quantity;
            $book->save();
        }

        $booking->delete();

        return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully!');
    }

}
