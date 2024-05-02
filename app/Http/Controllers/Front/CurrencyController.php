<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Currency;

class CurrencyController extends Controller
{
    public function updateCurrency(Request $request)
{
    $selectedCurrency = $request->input('currency');

    $exchangeRate = Currency::where('code', $selectedCurrency)->value('exchange_rate');

    Session::put('currency', $selectedCurrency);
    Session::put('exchange_rate', $exchangeRate);

    return response()->json(['success' => 'Currency updated successfully.']);
}
}
