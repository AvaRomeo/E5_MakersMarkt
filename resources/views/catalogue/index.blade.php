@extends('layouts.base')

@section('content')

<div class="container mx-auto px-4">
    <h1 class="text-4xl font-extrabold text-gray-900 text-center my-8">Catalogue</h1>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach($products as $product)
            <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                <a href="{{ route('catalogue.detail', $product->id) }}">
                    <img src="{{ $product->image_path }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                </a>
                <div class="p-4">
                    <a href="{{ route('catalogue.detail', $product->id) }}" class="block text-lg font-bold text-gray-900 hover:text-indigo-600">
                        {{ $product->name }}
                    </a>
                    <p class="text-gray-700 mt-2">{{ $product->description }}</p>
                    <a href="{{ route('cart.add', $product->id)}}" class="inline-block mt-4 px-4 py-2 bg-indigo-600 text-white font-semibold rounded hover:bg-indigo-500">
                        Add to Cart
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection