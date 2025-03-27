<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoinLayerController;
use App\Http\Controllers\HomepageController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/coinlayer/live', [CoinLayerController::class, 'getLiveRates']);
Route::get('/coinlayer/historical', [CoinLayerController::class, 'getHistoricalRates']);
Route::get('/coinlayer/list', [CoinLayerController::class, 'getCryptoList']);
Route::get('/coinlayer/convert', [CoinLayerController::class, 'convertCurrency']);

Route::get('/featured-listings', [HomepageController::class, 'getFeaturedListingsByCommunity'])->name('featured.listings');


