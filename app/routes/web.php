<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdsController;

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

Route::get('/', [MainController::class, 'index'])->name('home');
Route::get('/ads/{id}', [MainController::class, 'view'])->name('ads_view');

Route::get('/user/{user}', [\App\Http\Controllers\UserController::class, 'show'])->name('user.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/avatar', [ProfileController::class, 'avatar'])->name('profile.avatar');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/new-listing', [AdsController::class, 'selectCategory'])->name('new.listing');
    Route::get('/ad-create', [AdsController::class, 'create'])->name('add_ad');
    Route::post('/ad-store', [AdsController::class, 'store'])->name('store_ad');
});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});

require __DIR__.'/auth.php';
require __DIR__.'/social.php';
