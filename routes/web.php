<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\MemberRegistrationController;
use App\Http\Controllers\Auth\MemberLoginController;
use App\Http\Controllers\MemberProfileController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');

Route::prefix('member')->group(function () {
    Route::get('/register', [MemberRegistrationController::class, 'create'])->name('register.member');
    Route::post('/register', [MemberRegistrationController::class, 'store']);
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

    // Route::resource('books', BookController::class); // CRUD untuk
    Route::get('/books', [BookController::class, 'index'])->name('books.index');
    Route::get('/books-create', [BookController::class, 'create'])->name('books.creates');
    Route::post('/books', [BookController::class, 'store'])->name('books.store');
    Route::get('/books/edit/{id}', [BookController::class, 'edit'])->name('books.edit');
    Route::put('/books/update/{id}', [BookController::class, 'update'])->name('books.update');
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
