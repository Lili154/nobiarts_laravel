<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Currency;
use App\Models\Product;
use GuzzleHttp\Client;
use App\Http\Middleware\SetCurrency;



class CurrencyController extends Controller
{
    public function  __construct()
    {
        $this->middleware('SetCurrency');
    }

    public function changeCurrency(Request $request)
    {
        $selectedCurrency = $request->input('currency');

        $exchangeRate = Currency::where('code', $selectedCurrency)->value('exchange_rate');

        if ($exchangeRate) {
            Session::put('currency', $selectedCurrency);
            Session::put('exchange_rate', $exchangeRate);

            return response()->json(['success' => 'Currency updated successfully.']);
        } else {
            return response()->json(['error' => 'Invalid currency.']);
        }
    }

    public function getConvertedPrices(Request $request)
{
    $selectedCurrency = $request->input('currency');

    $products = Product::all();

    $exchangeRates = $this->getExchangeRates();

    if (!array_key_exists($selectedCurrency, $exchangeRates)) {
        return response()->json(['error' => 'Invalid currency.']);
    }

    $convertedPrices = [];
    foreach ($products as $product) {
        $convertedPrice = $product->price * $exchangeRates[$selectedCurrency];
        $convertedPrices[$product->id] = $convertedPrice;
    }
    return response()->json($convertedPrices);
}

    public function getExchangeRates()
    {
        $client = new Client();
        $response = $client->get('https://api.freecurrencyapi.com/v1/latest?apikey=fca_live_QyeBK0dL1A7eBYxdIQX3nVtKe6pmuznL7XqYbflh&currencies=EUR%2CBGN&base_currency=RUB');

        $data = json_decode($response->getBody(), true);

        $exchangeRates = $data['data'];
// dd($exchangeRates);
        return $exchangeRates;
    }
}
