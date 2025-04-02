<?php

namespace App\Console\Commands;

use App\Models\Currency;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class UpdateCurrencyRates extends Command
{
    protected $signature = 'currencies:update';
    protected $description = 'Fetch and update currency exchange rates';

    public function handle()
    {
        $this->updateCryptoRates();
        // $this->updateFiatRates();
        $this->info('Currency rates updated successfully.');
    }

    private function updateCryptoRates()
    {
        $cryptoApiKey = env('COINLAYER_API_KEY');
        $apiUrl = 'https://api.coinlayer.com/';

        $response = Http::get($apiUrl . 'live', [
            'access_key' => $cryptoApiKey,
            'target' => 'AED',
        ]);

        if ($response->successful()) {
            $data = $response->json();
            if (!isset($data['rates'])) {
                $this->error('Invalid Crypto API response');
                return;
            }

            foreach ($data['rates'] as $code => $rate) {
                Currency::updateOrCreate(
                    ['code' => $code],
                    ['name' => $code, 'rate' => $rate, 'type' => 'crypto']
                );
            }
        } else {
            $this->error('Failed to fetch crypto rates');
        }
    }

    // private function updateFiatRates()
    // {
    //     $fiatApiKey = 'YOUR_FIXER_IO_API_KEY'; // Replace with your Fixer.io API key
    //     $fiatUrl = "http://data.fixer.io/api/latest?access_key={$fiatApiKey}";

    //     $response = Http::get($fiatUrl);
    //     if ($response->successful()) {
    //         $data = $response->json();
    //         if (!isset($data['rates'])) {
    //             $this->error('Invalid Fiat API response');
    //             return;
    //         }

    //         foreach ($data['rates'] as $code => $rate) {
    //             Currency::updateOrCreate(
    //                 ['code' => $code],
    //                 ['name' => $code, 'rate' => $rate, 'type' => 'fiat']
    //             );
    //         }
    //     } else {
    //         $this->error('Failed to fetch fiat rates');
    //     }
    // }
}
