@extends('layouts.base')

@section('content')
    @if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded-lg mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="mb-6 flex justify-between items-center">
                <h2 class="text-3xl font-extrabold text-gray-900">Products</h2>
                <a href="{{ route('products.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700">Create New Product</a>
            </div>
            <div class="mt-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
                @foreach($products as $product)
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="px-4 py-5 sm:px-6">
                            @if($product->image_path)
                                <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-auto max-w-sm mx-auto">
                            @endif
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
