<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\IndexControllers;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\StoreDetailController;

Route::get('/', [AuthController::class, 'index']);
Route::get('/registration', function () {
    return view('auth.register');
});
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware('guest');
Route::get('/login', [AuthenticatedSessionController::class, 'create'])->middleware('guest')->name('login');

Route::middleware(['auth'])->group(function() {
    Route::get('/favorite', [FavoriteController::class, 'index'])->name('favorite.index');
    Route::post('/toggle-favorite/{storeId}', [FavoriteController::class, 'toggleFavorite']);
    Route::post('/stores', [StoreController::class, 'store'])->name('stores.store');
    Route::delete('/stores/{store}', [StoreController::class, 'destroy'])->name('stores.destroy');
    Route::get('/stores', [StoreController::class, 'index'])->name('stores.index');
    Route::get('/areas/{area}', [StoreController::class, 'storesByArea'])->name('stores.by_area');
    Route::get('/areas', [AreaController::class, 'index'])->name('areas.index');
    Route::get('/store_detail/{id}', [StoreDetailController::class, 'show'])->name('store.detail');
    Route::post('/reservation', [ReservationController::class, 'store'])->name('reservation.store');
    Route::delete('/reservations/{reservation}', [ReservationController::class, 'destroy'])->name('reservations.destroy');
});

Route::get('/favorite', [FavoriteController::class, 'index'])->middleware('auth')->name('favorite.index');

Route::get('/stores/search', [StoreController::class, 'search'])->name('store.search');

Route::middleware(['web'])->group(function(){
    Route::view('/booking_is_done', 'booking_is_done')->name('booking_is_done');
});
