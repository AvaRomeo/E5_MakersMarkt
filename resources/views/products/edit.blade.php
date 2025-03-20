<!-- resources/views/products/edit.blade.php -->

@extends('layouts.base')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl w-full bg-white shadow-lg rounded-lg overflow-hidden">
        <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT') <!-- Voor een update-verzoek -->
            
            <div class="p-4">
                <h2 class="text-3xl font-bold text-gray-900 mb-4">Bewerk Product</h2>

                <!-- Productnaam -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Productnaam</label>
                    <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('name', $product->name) }}" required>
                    @error('name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Beschrijving -->
                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Beschrijving</label>
                    <textarea name="description" id="description" class="w-full p-2 border border-gray-300 rounded-lg" required>{{ old('description', $product->description) }}</textarea>
                    @error('description') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Type product -->
                <div class="mb-4">
                    <label for="type" class="block text-gray-700">Type</label>
                    <select name="type" id="type" class="w-full p-2 border border-gray-300 rounded-lg" required>
                        <option value="Sieraden" @if($product->type == 'Sieraden') selected @endif>Sieraden</option>
                        <option value="Keramiek" @if($product->type == 'Keramiek') selected @endif>Keramiek</option>
                        <option value="Textiel" @if($product->type == 'Textiel') selected @endif>Textiel</option>
                        <option value="Kunst" @if($product->type == 'Kunst') selected @endif>Kunst</option>
                    </select>
                    @error('type') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Materiaalgebruik -->
                <div class="mb-4">
                    <label for="material_usage" class="block text-gray-700">Materiaalgebruik</label>
                    <textarea name="material_usage" id="material_usage" class="w-full p-2 border border-gray-300 rounded-lg" required>{{ old('material_usage', $product->material_usage) }}</textarea>
                    @error('material_usage') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Productietijd -->
                <div class="mb-4">
                    <label for="production_time" class="block text-gray-700">Productietijd (in uren)</label>
                    <input type="number" name="production_time" id="production_time" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('production_time', $product->production_time) }}" required>
                    @error('production_time') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Complexiteit -->
                <div class="mb-4">
                    <label for="complexity" class="block text-gray-700">Complexiteit</label>
                    <select name="complexity" id="complexity" class="w-full p-2 border border-gray-300 rounded-lg" required>
                        <option value="Laag" @if($product->complexity == 'Laag') selected @endif>Laag</option>
                        <option value="Middel" @if($product->complexity == 'Middel') selected @endif>Middel</option>
                        <option value="Hoog" @if($product->complexity == 'Hoog') selected @endif>Hoog</option>
                    </select>
                    @error('complexity') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Duurzaamheid -->
                <div class="mb-4">
                    <label for="durability" class="block text-gray-700">Duurzaamheid</label>
                    <textarea name="durability" id="durability" class="w-full p-2 border border-gray-300 rounded-lg" required>{{ old('durability', $product->durability) }}</textarea>
                    @error('durability') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Unieke eigenschappen -->
                <div class="mb-4">
                    <label for="unique_features" class="block text-gray-700">Unieke eigenschappen</label>
                    <textarea name="unique_features" id="unique_features" class="w-full p-2 border border-gray-300 rounded-lg">{{ old('unique_features', $product->unique_features) }}</textarea>
                    @error('unique_features') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Prijs -->
                <div class="mb-4">
                    <label for="price" class="block text-gray-700">Prijs (€)</label>
                    <input type="number" name="price" id="price" class="w-full p-2 border border-gray-300 rounded-lg" value="{{ old('price', $product->price) }}" required step="0.01">
                    @error('price') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Afbeelding -->
                <div class="mb-4">
                    <label for="image" class="block text-gray-700">Afbeelding</label>
                    <input type="file" name="image" id="image" class="w-full p-2 border border-gray-300 rounded-lg">
                    @error('image') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-indigo-600 text-white p-3 rounded-lg mt-4">Bewerk Product</button>
            </div>
        </form>
    </div>
</div>
@endsection
