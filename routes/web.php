<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Models\Product;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/login', function () {
    return view('login/login');
});

Route::get('/register', function () {
    return view('login/register');
});

Route::get('/dashboard', function () {
    $products = Product::paginate(10);
    return view('dashboard_mod')->with('products', $products);
});


Route::get('/login', [UsersController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [UsersController::class, 'logout'])->name('logout');


Route::post('/register', [UsersController::class, 'store']);
Route::post(uri: '/login', action: [UsersController::class, 'login']);

Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');

Route::get('/makers/{id}/portfolio', function ($id) {
    $user = \App\Models\User::find($id);
    $products = Product::where('user_id', $id)->get();
    return view('makers.portfolio', ['id' => $id, 'user' => $user, 'products' => $products]);
})->name('makers.portfolio');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UsersController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [UsersController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [UsersController::class, 'update'])->name('profile.update');
    Route::delete('/profile/destroy', [UsersController::class, 'destroy'])->name('profile.destroy');
});

Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');


// Route::post('/logout', [UsersController::class, 'logout'])->name('logout');
