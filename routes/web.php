<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $tours = \App\Models\Tour::where('status', 'Published')->latest()->take(6)->get();
    return view('welcome', compact('tours'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'create'])->name('login');
        Route::post('login', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'store']);
    });

    Route::middleware(['auth', 'isAdmin'])->group(function () {
        Route::get('dashboard', function () {
            return view('admin.dashboard');
        })->name('dashboard');

        Route::post('logout', [\App\Http\Controllers\Admin\Auth\AuthenticatedSessionController::class, 'destroy'])->name('logout');
        
        Route::resource('tour_categories', \App\Http\Controllers\Admin\TourCategoryController::class);
        Route::resource('tours', \App\Http\Controllers\Admin\TourController::class);
        Route::resource('departures', \App\Http\Controllers\Admin\DepartureController::class);
        Route::resource('bookings', \App\Http\Controllers\Admin\BookingController::class);
    });
});

require __DIR__.'/auth.php';
