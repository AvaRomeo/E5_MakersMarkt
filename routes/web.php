<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CatalogueController;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('login/login');
});

Route::get('/register', function () {
    return view('login/register');
});

Route::get('/catalogue', [CatalogueController::class, 'index'])->middleware(['auth', 'verified'])->name('catalogue.index');
Route::get('/catalogue/{id}/detail', [CatalogueController::class, 'show'])->middleware(['auth', 'verified'])->name('catalogue.detail');


Route::get('/login', [UsersController::class, 'showLoginForm'])->name('login');


Route::post('/register', [UsersController::class, 'store']);
Route::post(uri: '/login', action: [UsersController::class, 'login']);

// Route::post('/logout', [UsersController::class, 'logout'])->name('logout');
