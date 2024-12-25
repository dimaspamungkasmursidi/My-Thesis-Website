<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Booking;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{

    // public function __construct()
    // {
    //     // Pastikan pengguna sudah login
    //     $this->middleware('member');
    // }

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
            return redirect()->back()->with('error', 'Yah, sayang banget, stok bukunya kosong.');
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

        return redirect()->back()->with('success', 'Booking telah ditambahkan. tunggu persetujuan admin ya!');
    }

    public function myBooking()
    {      
        Log::info('Member ID:', ['id' => Auth::guard('member')->id()]);

    if (!Auth::guard('member')->check()) {
        Log::warning('Member is not logged in.');
        return redirect()->route('login.member')->with('error', 'You must be logged in to view your bookings.');
    }

    $bookings = Booking::where('member_id', Auth::guard('member')->id())
                       ->whereIn('status', ['pending', 'approved', 'rejected'])
                       ->orderBy('created_at', 'desc') // Tambahkan orderBy untuk mengatur urutan
                       ->paginate(10); // Menampilkan 10 data per halaman
                       
    return view('myBooking', compact('bookings'));
    }
}
