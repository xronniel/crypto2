<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CoinLayerController extends Controller
{
    private $apiUrl = 'https://api.coinlayer.com/';
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env('COINLAYER_API_KEY');
    }

    /**
     * Get Live Exchange Rates
     * Endpoint: /live
     */
    public function getLiveRates(Request $request)
    {
        // $currencies = $request->query('currencies', 'BTC,ETH,LTC');
        $response = Http::get($this->apiUrl . 'live', [
            'access_key' => $this->apiKey,
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Unable to fetch live rates'], 500);
        }

        return response()->json($response->json());
    }

    /**
     * Get Historical Exchange Rates
     * Endpoint: /historical
     */
    public function getHistoricalRates(Request $request)
    {
        // Get the date, defaulting to today if not provided
        $date = $request->query('date', now()->format('Y-m-d'));

        // Build the correct URL with the date
        $url = $this->apiUrl . $date;

        // Make the API request
        $response = Http::get($url, [
            'access_key' => $this->apiKey,
        ]);

        // Handle any errors
        if ($response->failed()) {
            return response()->json(['error' => 'Unable to fetch historical rates'], 500);
        }

        return response()->json($response->json());

    }

    /**
     * Get Crypto List
     * Endpoint: /list
     */
    public function getCryptoList()
    {
        $response = Http::get($this->apiUrl . 'list', [
            'access_key' => $this->apiKey,
        ]);

        if ($response->failed()) {
            return response()->json(['error' => 'Unable to fetch crypto list'], 500);
        }

        return response()->json($response->json());
    }

    public function convertCurrency(Request $request)
    {
        // Validate request parameters
        $request->validate([
            'from'   => 'required|string|max:5',
            'to'     => 'required|string|max:5',
            'amount' => 'required|numeric|min:0.01',
            'date'   => 'nullable|date_format:Y-m-d',
        ]);

        // Get parameters from request
        $from = strtoupper($request->query('from'));
        $to = strtoupper($request->query('to'));
        $amount = $request->query('amount');
        $date = $request->query('date');

        // Build URL for conversion
        $url = $this->apiUrl . 'convert';

        // Set API parameters
        $queryParams = [
            'access_key' => $this->apiKey,
            'from'       => $from,
            'to'         => $to,
            'amount'     => $amount,
        ];

        // Add historical date if provided
        if (!empty($date)) {
            $queryParams['date'] = $date;
        }

        // Make API request
        $response = Http::get($url, $queryParams);

        // Handle errors
        if ($response->failed()) {
            return response()->json(['error' => 'Unable to convert currency'], 500);
        }

        // Return successful conversion
        return response()->json($response->json());
    }
}
