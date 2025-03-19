@extends('layouts.base')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-2xl w-full bg-white shadow-lg rounded-lg overflow-hidden">
            <div class="bg-cover bg-center h-56 p-4" style="background-image: url('{{ $product->image_path }}')">
            </div>
            <div class="p-4">
                <h2 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h2>
                <p class="text-lg text-gray-700 mt-1">Gemaakt door: 
                    <span class="font-medium text-gray-900">{{ $product->maker->name }}</span>
                    <a href="{{ route('makers.portfolio', $product->maker->id) }}" class="text-blue-500 hover:underline ml-2">Bekijk portfolio</a>
                </p>
                <p class="mt-4 text-gray-600 leading-relaxed">{{ $product->description }}</p>
                <div class="mt-4">
                    <h3 class="text-xl font-semibold text-gray-900">Specificaties</h3>
                    <ul class="mt-2 text-gray-600">
                        <li><strong>Unieke Kenmerken:</strong> {{ $product->unique_features }}</li>
                        <li><strong>Duurzaamheid:</strong> {{ $product->durability }}</li>
                        <li><strong>Type:</strong> {{ $product->type }}</li>
                        <li><strong>Materiaalgebruik:</strong> {{ $product->material_usage }}</li>
                        <li><strong>Productietijd:</strong> {{ $product->production_time }}</li>
                        <li><strong>Complexiteit:</strong> {{ $product->complexity }}</li>
                    </ul>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-2xl text-gray-900">€{{ number_format($product->price, 2) }}</span>
                    <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">Terug naar overzicht</a>
                </div>
            </div>
        </div>
    </div>
@endsection