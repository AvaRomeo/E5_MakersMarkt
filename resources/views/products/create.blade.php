@extends('layouts.base')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl w-full bg-white p-8 rounded-lg shadow-lg">
        <h2 class="text-2xl font-extrabold text-gray-900 mb-6 text-center">Nieuw Product Aanmaken</h2>

        <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
            @csrf

            <!-- Productnaam -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Productnaam</label>
                <input type="text" name="name" id="name" placeholder="Productnaam" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Beschrijving -->
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700">Beschrijving</label>
                <textarea name="description" id="description" placeholder="Beschrijving" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <!-- Type product -->
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-700">Type product</label>
                <select name="type" id="type" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="Jewelry">Sieraden</option>
                    <option value="Ceramics">Keramiek</option>
                    <option value="Textiles">Textiel</option>
                    <option value="Art">Kunst</option>
                </select>
            </div>

            <!-- Materialen -->
            <div class="mb-4">
                <label for="material_usage" class="block text-sm font-medium text-gray-700">Materiaalgebruik</label>
                <textarea name="material_usage" id="material_usage" placeholder="Materiaalgebruik" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <!-- Productietijd -->
            <div class="mb-4">
                <label for="production_time" class="block text-sm font-medium text-gray-700">Productietijd in uren</label>
                <input type="number" name="production_time" id="production_time" placeholder="Productietijd in uren" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Complexiteit -->
            <div class="mb-4">
                <label for="complexity" class="block text-sm font-medium text-gray-700">Complexiteit</label>
                <select name="complexity" id="complexity" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="Laag">Laag</option>
                    <option value="Middel">Middel</option>
                    <option value="Hoog">Hoog</option>
                </select>
            </div>

            <!-- Duurzaamheid -->
            <div class="mb-4">
                <label for="durability" class="block text-sm font-medium text-gray-700">Duurzaamheid</label>
                <textarea name="durability" id="durability" placeholder="Duurzaamheid" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <!-- Unieke eigenschappen -->
            <div class="mb-4">
                <label for="unique_features" class="block text-sm font-medium text-gray-700">Unieke eigenschappen</label>
                <textarea name="unique_features" id="unique_features" placeholder="Unieke eigenschappen"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>

            <!-- Prijs -->
            <div class="mb-4">
                <label for="price" class="block text-sm font-medium text-gray-700">Prijs</label>
                <input type="number" name="price" id="price" step="0.01" placeholder="Prijs" required
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Afbeelding -->
            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700">Afbeelding</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="mt-1 block w-full text-sm text-gray-700 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <!-- Submit knop -->
            <div class="mb-4 text-center">
                <button type="submit" class="w-full bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-opacity-50">
                    Product Aanmaken
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
