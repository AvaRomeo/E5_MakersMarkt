<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('login/login');
});

Route::get('/register', function () {
    return view('login/register');
});


Route::get('/login', [UsersController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [UsersController::class, 'logout'])->name('logout');


Route::post('/register', [UsersController::class, 'store']);
Route::post(uri: '/login', action: [UsersController::class, 'login']);


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UsersController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [UsersController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [UsersController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy', [UsersController::class, 'destroy'])->name('profile.destroy');
});

// Route::post('/logout', [UsersController::class, 'logout'])->name('logout');
