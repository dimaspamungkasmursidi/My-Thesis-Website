<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with('book', 'member')->get();
        return view('admin.bookings.index', compact('bookings'));
    }

    public function approve($id, Request $request)
    {
        $booking = Booking::findOrFail($id);

        $booking->status = 'approved';
        
        $booking->borrow_date = $request->borrow_date;
        $booking->return_date = $request->return_date;
        $booking->save();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking has been approved.');
    }

    public function reject($id)
    {
        $booking = Booking::findOrFail($id);

        $booking->status ='rejected';
        $booking->save();

        return redirect()->route('admin.bookings.index')->with('success', 'Booking has been rejected.');
    }
}
