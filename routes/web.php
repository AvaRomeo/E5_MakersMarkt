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


Route::post('/register', [UsersController::class, 'store']);
Route::post(uri: '/login', action: [UsersController::class, 'login']);

// Route::post('/logout', [UsersController::class, 'logout'])->name('logout');
