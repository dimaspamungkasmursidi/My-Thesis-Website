<?php

use App\Http\Controllers\AdminBookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\MemberRegistrationController;
use App\Http\Controllers\Auth\MemberLoginController;
use App\Http\Controllers\MemberProfileController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\BookingController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');
Route::get('/allBook/{categoryId}', [BookController::class, 'indexByCategory'])->name('books.category');

Route::get('/allBook', [HomeController::class, 'allBook'])->name('allBook');

Route::prefix('member')->group(function () {
    Route::get('/register', [MemberRegistrationController::class, 'create'])->name('register.member');
    Route::post('/register', [MemberRegistrationController::class, 'store']);
    
Route::get('/myBooking', [BookingController::class, 'myBooking'])->name('myBooking');
});

// Booking
Route::middleware(['auth:member'])->group(function () {
    Route::get('/book/{book_id}/booking', [BookController::class, 'create'])->name('booking.create');
    Route::post('/booking', [BookingController::class, 'store'])->name('bookings.store');
});

Route::get('/login-member', [MemberLoginController::class, 'create'])->name('login.member');
Route::post('/login-member', [MemberLoginController::class, 'store']);
Route::post('/logout-member', [MemberLoginController::class, 'destroy'])->name('logout.member');

Route::get('/member/edit', [MemberProfileController::class, 'edit'])->name('member.edit');
Route::post('/member/update', [MemberProfileController::class, 'update'])->name('member.update');
Route::get('/logout-member', [MemberProfileController::class, 'destroy'])->name('member.destroy');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth:member')->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Dashboard routes
    Route::get('dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/members', [AdminDashboardController::class, 'members'])->name('members');
    Route::delete('/members/{id}', [AdminDashboardController::class, 'destroy'])->name('members.destroy');

    // Route::resource('books', BookController::class); // CRUD untuk
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books-create', [BookController::class, 'create'])->name('books.creates');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/update/{id}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');
    

    Route::get('/admin/bookings', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
    Route::get('/layout/navigation', [AdminBookingController::class, 'index'])->name('admin.bookings.index');

    // Route untuk menghapus booking
    Route::delete('admin/bookings/{id}', [AdminBookingController::class, 'destroyMyBooking'])->name('admin.booking.destroy');

    // Approve dan penolakan booking
    Route::put('/admin/bookings/{id}/approve', [AdminBookingController::class, 'approve'])->name('admin.booking.approve');
    Route::put('/admin/bookings/{id}/reject', [AdminBookingController::class, 'reject'])->name('admin.booking.reject');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
