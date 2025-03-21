<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CatalogueController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $priceOrder = $request->input('price_order'); // 'asc' or 'desc'
        $type = $request->input('type');
        $material = $request->input('material_usage');

        $allTypes = Product::select('type')->distinct()->pluck('type');

        $products = Product::when($search, function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%$search%")
                      ->orWhere('price', 'like', "%$search%")
                      ->orWhere('type', 'like', "%$search%")
                      ->orWhere('material_usage', 'like', "%$search%");
            });
        })
        ->when($priceOrder, function ($query, $priceOrder) {
            $query->orderBy('price', $priceOrder);
        })
        ->when($type, function ($query, $type) {
            $query->where('type', $type);
        })
        ->when($material, function ($query, $material) {
            $query->where('material_usage', $material);
        })
        ->paginate(15);

        return view('catalogue.index', compact('products', 'search', 'priceOrder', 'type', 'material', 'allTypes'));
    }

    public function show($id)
    {
        $product = Product::find($id);

        return view('catalogue.show', compact('product'));
    }
}
