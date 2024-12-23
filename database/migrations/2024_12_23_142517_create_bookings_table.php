<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id');
            $table->foreign('book_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreignId('member_id');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->integer('quantity');
            $table->dateTime('booked_at');
            $table->integer('stock');
            $table->date('borrow_date');
            $table->date('return_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
