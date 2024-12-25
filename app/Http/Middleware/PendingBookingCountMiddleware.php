<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\View;
use App\Models\Booking;

class PendingBookingCountMiddleware
{
    public function handle($request, Closure $next)
    {
        $pendingCount = Booking::where('status', 'pending')->count();
        View::share('pendingCount', $pendingCount);

        return $next($request);
    }
}
