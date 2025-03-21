<?php

use App\Http\Controllers\HomepageContentController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:Admin'])->group(function () {

    Route::resource('news', NewsController::class);
    Route::get('homepage', [HomepageContentController::class, 'index'])->name('homepage.index');
    Route::get('homepage/edit', [HomepageContentController::class, 'edit'])->name('homepage.edit');
    Route::put('homepage', [HomepageContentController::class, 'update'])->name('homepage.update');

});

Route::get('/', [HomepageController::class, 'homepage'])->name('homepage');
Route::get('/news', [NewsController::class, 'userIndex'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'userShow'])->name('news.show');

Route::get('/contact-us', function () {
    return view('contact');
});
Route::get('/blog', function () {
    return view('blog');
});

Auth::routes();