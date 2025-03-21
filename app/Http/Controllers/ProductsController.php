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

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        // Validatie van de velden
        $request->validate([
            'name' => 'required|string|max:255', // Naam van het product is verplicht
            'description' => 'required|string', // Beschrijving is verplicht
            'type' => 'required|in:Jewelry,Ceramics,Textiles,Art', // Type must be one of the four options
            'material_usage' => 'required|string', // Materialen moeten beschreven worden
            'production_time' => 'required|integer', // Productietijd moet een getal zijn
            'complexity' => 'required|in:Laag,Middel,Hoog', // Complexiteit moet een van de drie waarden zijn
            'durability' => 'required|string', // Duurzaamheid moet beschreven worden
            'unique_features' => 'nullable|string', // Unieke eigenschappen kunnen leeg zijn
            'price' => 'required|numeric|min:0', // Prijs moet een positief getal zijn
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Afbeelding is optioneel
        ]);

        // Verwerken van de afbeelding (indien geüpload)
        $imagePath = null;
        if ($request->hasFile('image')) {
            // Sla de afbeelding op in de opslag en krijg het pad terug
            $imagePath = $request->file('image')->store('product_images', 'public');
        }

        // Product aanmaken
        Product::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'type' => $request->input('type'),
            'material_usage' => $request->input('material_usage'),
            'production_time' => $request->input('production_time'),
            'complexity' => $request->input('complexity'),
            'durability' => $request->input('durability'),
            'unique_features' => $request->input('unique_features'),
            'price' => $request->input('price'),
            'image_path' => $imagePath, // Pad naar de afbeelding als die er is
            'user_id' => auth()->id(), // De maker is de ingelogde gebruiker
        ]);

        // Redirect terug naar de productpagina met een succesbericht
        return redirect()->route('products.index')->with('success', 'Product succesvol aangemaakt!');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Valideer de gegevens
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type' => 'required|in:Jewelry,Ceramics,Textiles,Art', // Type must be one of the four options
            'material_usage' => 'required|string',
            'production_time' => 'required|integer',
            'complexity' => 'required|string|in:Laag,Middel,Hoog',
            'durability' => 'required|string',
            'unique_features' => 'nullable|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|max:10240', // Maximaal 10MB
        ]);

        // Update het product
        $product->update($request->only([
            'name', 'description', 'type', 'material_usage', 'production_time', 'complexity', 'durability', 'unique_features', 'price'
        ]));

        // Als er een nieuwe afbeelding is geüpload, sla deze dan op
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('product_images', 'public');
            $product->update(['image_path' => $imagePath]);
        }

        return redirect()->route('products.show', $product->id)
                        ->with('success', 'Product succesvol bijgewerkt!');
    }

    // In ProductsController

    public function destroy(Product $product)
    {
        // Controleer of de ingelogde gebruiker de eigenaar van het product is
        if (auth()->user()->id !== $product->user_id && !auth()->user()->is_moderator) {
            return redirect()->route('products.index')->with('error', 'Je hebt geen toestemming om dit product te verwijderen.');
        }
        
        // Verwijder het product
        $product->delete();

        // Redirect naar de productoverzichtspagina met een succesmelding
        return redirect()->route('products.index')->with('success', 'Product succesvol verwijderd!');
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
