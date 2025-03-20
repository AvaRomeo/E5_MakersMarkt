<?php

use App\Http\Controllers\ProductsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\CartController;
use App\Models\Product;
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

Route::get('/dashboard', function () {
    $products = DB::table('products')->get();

    return view('dashboard_mod')->with('products', $products);
});



Route::get('/login', [UsersController::class, 'showLoginForm'])->name('login');
Route::post('/logout', [UsersController::class, 'logout'])->name('logout');


Route::post('/register', [UsersController::class, 'store']);
Route::post(uri: '/login', action: [UsersController::class, 'login']);

Route::middleware('auth')->group(function () {
    Route::get('/products', [ProductsController::class, 'index'])->name('products.index');
    Route::get('/products/create', [ProductsController::class, 'create'])->name('products.create');
    Route::post('/products', [ProductsController::class, 'store'])->name('products.store');
    Route::get('/products/{product}', [ProductsController::class, 'show'])->name('products.show');
    Route::get('/products/{product}/edit', [ProductsController::class, 'edit'])->name('products.edit');
    Route::put('/products/{product}', [ProductsController::class, 'update'])->name('products.update');
    Route::delete('/products/{product}', [ProductsController::class, 'destroy'])->name('products.destroy');
});

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');


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


// Route::post('/logout', [UsersController::class, 'logout'])->name('logout');
