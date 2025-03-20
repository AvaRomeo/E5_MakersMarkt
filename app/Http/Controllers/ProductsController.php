<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        $products = Product::find($product->id);
        return view('products.show', compact('product'));
    }

    


    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found!');
        }

        // Add product to cart
        $cart = session()->get('cart', []);
        $cart[$productId] = [
            'name' => $product->name,
            'price' => $product->price,
        ];
        session()->put('cart', $cart);

        return redirect()->route('products.index')->with('success', 'Product added to cart successfully!');
    }
}
