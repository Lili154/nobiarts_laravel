<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Currency;
use Illuminate\Support\Facades\Session;


class SetCurrency
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $currency = session('currency', 'RUB');
        $exchangeRate = session('exchange_rate', 1);

        Session::put('currency', $currency);
        Session::put('exchange_rate', $exchangeRate);

        return $next($request);
    }
}
