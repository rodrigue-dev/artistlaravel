<?php

use App\Http\Controllers\LanguageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\ShowController;
use App\Http\Controllers\RequestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/show', [ShowController::class, 'index'])->name('show.index');
Route::get('/show/{id}', [ShowController::class, 'show'])
	->where('id', '[0-9]+')->name('show.show');
Route::get('/show/{slug}', [ShowController::class, 'show'])
	->where('slug', '[a-zA-Z0-9]+')->name('show.showBySlug');
Route::get('/show/edit/{id}', [ShowController::class, 'edit'])
	->where('id', '[0-9]+')->name('show.edit');
Route::put('/show/{id}', [ShowController::class, 'update'])
	->where('id', '[0-9]+')->name('show.update');
Route::get('/show/create', [ShowController::class, 'create'])->name('show.create');
Route::post('/show', [ShowController::class, 'store'])->name('show.store');
Route::delete('/show/{id}', [ShowController::class, 'destroy'])
	->where('id', '[0-9]+')->name('show.delete');

Route::get('/artist', [ArtistController::class, 'index'])->name('artist.index');
Route::get('/artist/{id}', [ArtistController::class, 'show'])
	->where('id', '[0-9]+')->name('artist.show');
Route::get('/artist/edit/{id}', [ArtistController::class, 'edit'])
	->where('id', '[0-9]+')->name('artist.edit');
Route::put('/artist/{id}', [ArtistController::class, 'update'])
	->where('id', '[0-9]+')->name('artist.update');
Route::get('/artist/create', [ArtistController::class, 'create'])->name('artist.create');
Route::post('/artist', [ArtistController::class, 'store'])->name('artist.store');
Route::delete('/artist/{id}', [ArtistController::class, 'destroy'])
	->where('id', '[0-9]+')->name('artist.delete');

Route::prefix('admin')->group(function () {
    Route::get('/artist/language/{id}', [ArtistController::class, 'index'])->name('admin.artist.index');
	Route::get('/artist', [ArtistController::class, 'index'])->name('admin.artist.index');
	Route::get('/artist/edit/{id}', [ArtistController::class, 'edit'])
		->where('id', '[0-9]+')->name('admin.artist.edit');
    Route::match(array('GET', 'POST'),'/artist/language/{id}', [ArtistController::class, 'addlanguage'])
       ->name('admin.artist.addlanguage');
	Route::put('/artist/{id}', [ArtistController::class, 'update'])
		->where('id', '[0-9]+')->name('admin.artist.update');
	Route::get('/artist/create', [ArtistController::class, 'create'])->name('admin.artist.create');
	Route::post('/artist', [ArtistController::class, 'store'])->name('admin.artist.store');
	Route::delete('/artist/{id}', [ArtistController::class, 'destroy'])
		->where('id', '[0-9]+')->name('admin.artist.delete');

    Route::get('/language', [LanguageController::class, 'index'])->name('admin.language.index');
    Route::get('/language/artist/{id}', [LanguageController::class, 'artists'])->name('admin.language.artist');
    Route::post('/language', [LanguageController::class, 'store'])->name('admin.language.store');
    Route::get('/language/create', [LanguageController::class, 'create'])->name('admin.language.create');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/request', [RequestController::class, 'index'])->name('request.index');
Route::get('/request/{id}', [RequestController::class, 'resolver'])->name('request.resolver');

//Test de Cashier
Route::post('/purchase', function (Request $request) {
    $stripeCharge = $request->user()->charge(
        100, $request->paymentMethodId
    );

    // ...
});

require __DIR__.'/auth.php';
