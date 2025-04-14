<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CoinLayerController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\PropertyLeadController;
use App\Http\Controllers\ReviewController;

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
Route::get('/crypto-currencies', [CurrencyController::class, 'getCryptoCurrencies'])->name('crypto.currencies');

Route::get('/reviews', [ReviewController::class, 'getAllReviews'])->name('reviews.all');

Route::prefix('comments')->group(function () {
    Route::post('/', [\App\Http\Controllers\Api\CommentController::class, 'store'])->name('comments.store');
    Route::put('/{comment}/status', [\App\Http\Controllers\Api\CommentController::class, 'updateStatus'])->name('comments.updateStatus');
    Route::delete('/{comment}', [\App\Http\Controllers\Api\CommentController::class, 'destroy'])->name('comments.destroy');
});

Route::prefix('property-leads')->group(function () {
    Route::post('/', [PropertyLeadController::class, 'store'])->name('property.leads.store');
});
