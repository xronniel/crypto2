<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class SetCurrency
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated and set the currency
        if (auth()->check()) {
            $currencyCode = auth()->user()->currency_code;
        } else {
            $currencyCode = Cookie::get('currency_code', 'AED');
        }

        // Set the currency in the session (optional)
        session(['currency_code' => $currencyCode]);

        return $next($request);
    }
}
