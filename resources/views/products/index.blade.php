@extends('layouts.base')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div>
                <h2 class="mt-6 text-center text-3xl leading-9 font-extrabold text-gray-900">
                    Products
                </h2>
            </div>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @foreach($products as $product)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="px-4 py-5 sm:px-6">
                            <img class="h-40 w-full object-cover" src="{{ $product->image_path }}" alt="{{ $product->name }}">
                        </div>
                        <div class="px-4 py-5 sm:p-6">
                            <p class="text-lg leading-6 font-medium text-gray-900">{{ $product->name }}</p>
                            <p class="mt-1 text-sm leading-5 text-gray-500">Prijs: &euro;{{ number_format($product->price, 2, ',', '.') }}</p>
                        </div>
                        <div class="px-4 py-4 sm:px-6 border-t border-gray-200">
                            <a href="{{ route('products.show', $product->id) }}" class="text-indigo-600 hover:text-indigo-900">Show More Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
