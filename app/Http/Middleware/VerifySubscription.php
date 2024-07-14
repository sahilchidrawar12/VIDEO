<?php

namespace App\Http\Middleware;

use Closure;

class VerifySubscription
{
    public function handle($request, Closure $next)
    {
        // Check if user has an active subscription
        if (!auth()->user()->hasActiveSubscription()) {
            return redirect()->route('subscribe')->with('error', 'Please subscribe to access courses.');
        }

        return $next($request);
    }
}
