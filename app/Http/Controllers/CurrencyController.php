<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class CurrencyController extends Controller
{
    // Set currency for the user (Authenticated or not)
    public function selectCurrency(Request $request)
    {
        $currencyCode = $request->input('currency_code');  // The selected currency code (e.g., USD, BTC)
       
        $user = Auth::user(); 
        // If user is authenticated, save it to the database
        if ($user) {
            $user = Auth::user();
            $user->currency_code = $currencyCode;
            $user->save();
        } else {
            // If not authenticated, save the currency to a cookie for 1 year
            Cookie::queue('currency_code', $currencyCode, 60 * 24 * 365);  // 1 year expiry
        }

        return redirect()->back();  // Redirect back after saving the selected currency
    }

    public function getCryptoCurrencies()
    {
        $cryptoCurrencies = Currency::where('type', 'crypto')->get();

        return response()->json([
            'success' => true,
            'data' => $cryptoCurrencies,
        ]);
    }
}
