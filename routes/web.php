<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;


Route::inertia('/', 'welcome')->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::inertia('dashboard', 'dashboard')->name('dashboard');

    Route::resource('users', UserController::class)
    ->except(['show']);

    

    // Route::resource('/users', UserController::class);
});

Route::get('/homes', [HomeController::class, 'index'])->name('homes.index');
Route::get('/homes/create', [HomeController::class, 'create'])->name('homes.create');
Route::post('/homes', [HomeController::class, 'store'])->name('homes.store');


// Route::get('/users', [UserController::class, 'index'])->name('users.index');
// Route::get ('/users', [UserController::class, 'index'])->name('user.index');

// Route::resource('/users', UserController::class);



require __DIR__.'/settings.php';
