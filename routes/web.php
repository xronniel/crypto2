<?php

use App\Http\Controllers\AgentController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\EmiratesController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HolidayPropertyController;
use App\Http\Controllers\HomepageContentController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ListingController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SavePropertyController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserPageController;
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
    Route::delete('news/gallery/{id}', [NewsController::class, 'deleteGalleryImage'])->name('gallery.delete');
    Route::resource('listings', ListingController::class);

    Route::resource('articles', ArticleController::class);
    Route::delete('articles/gallery/{id}', [ArticleController::class, 'deleteGalleryImage'])->name('article.gallery.delete');

    Route::get('homepage', [HomepageContentController::class, 'index'])->name('homepage.index');
    Route::get('homepage/edit', [HomepageContentController::class, 'edit'])->name('homepage.edit');
    Route::put('homepage', [HomepageContentController::class, 'update'])->name('homepage.update');

    Route::resource('agents', AgentController::class);
    Route::resource('developers', DeveloperController::class);
    Route::resource('districts', DistrictController::class);
    Route::resource('emirates', EmiratesController::class);
    Route::resource('countries', CountryController::class);
    Route::resource('facilities', FacilityController::class);
    Route::resource('communities', CommunityController::class);
    Route::resource('faqs', FaqController::class);
    Route::resource('partners', PartnerController::class);
    Route::resource('reviews', ReviewController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('holiday-properties', HolidayPropertyController::class);
});



Route::get('/', [HomepageController::class, 'homepage'])->name('homepage');

Route::middleware(['auth'])->group(function () {
    Route::get('/user/account', [UserPageController::class, 'account'])->name('user.account');
    Route::get('/user/saved-properties', [UserPageController::class, 'userSavedProperties'])->name('user.saved-properties');
    Route::get('/user/contacted-properties', [UserPageController::class, 'userContactedProperties'])->name('user.contacted-properties');

    Route::post('/user/save-property', [UserPageController::class, 'saveProperty'])->name('user.save-property');
    Route::post('/user/remove-saved-property', [UserPageController::class, 'removeSavedProperty'])->name('user.remove-saved-property');

    Route::post('/user/account/update', [UserPageController::class, 'update'])->name('user.account.update');

    Route::get('/saved-properties', [SavePropertyController::class, 'index']);

    Route::post('/saved-properties', [SavePropertyController::class, 'store']);

    Route::post('/saved-properties/remove', [SavePropertyController::class, 'destroy'])->name('saved-properties.destroy');
});

// Route::get('/news', [NewsController::class, 'userIndex'])->name('news.index');
// Route::get('/news/{news}', [NewsController::class, 'userShow'])->name('news.show');

// Route::get('/articles', [ArticleController::class, 'userIndex'])->name('articles.index');
// Route::get('/articles/{article}', [ArticleController::class, 'userShow'])->name('articles.show');

Route::get('/properties', [PropertyController::class, 'index'])->name('properties.index');
Route::get('/properties/{property}', [PropertyController::class, 'show'])->name('properties.show');

Route::get('/holiday-properties', [HolidayPropertyController::class, 'userIndex'])->name('holiday-properties.index');
Route::get('/holiday-properties/{holidayProperty}', [HolidayPropertyController::class, 'userShow'])->name('holiday-properties.show');

Route::get('/contact-us', function () {
    return view('contact');
});
Route::get('/blog', function () {
    return view('blog');
});

Route::get('news', [NewsController::class, 'indexUser'])->name('news.gallery');
Route::get('/news/{news}', [NewsController::class, 'showUser'])->name('news.gallery.show');

Route::get('articles', [ArticleController::class, 'indexUser'])->name('articles.gallery');
Route::get('/articles/{article}', [ArticleController::class, 'showUser'])->name('articles.gallery.show');

// Tag routes
Route::get('/tags/suggest', [TagController::class, 'suggest'])->name('tags.suggest');
Route::post('/tags/create', [TagController::class, 'create'])->name('tags.create');

Auth::routes();

Route::post('/currency/select', [CurrencyController::class, 'selectCurrency'])->name('currency.select');

Route::get('/agents', [AgentController::class, 'userIndex'])->name('agents.index');
Route::get('/agents/{agent}', [AgentController::class, 'userShow'])->name('agents.show');
