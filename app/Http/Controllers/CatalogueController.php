<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CatalogueController extends Controller
{
    public function index()
    {
            $products = Product::select('id', 'image_path', 'name', 'description', 'price')->get();

            return view('catalogue.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('products.show', compact('product'));
    }
}
