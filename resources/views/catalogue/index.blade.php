@extends('layouts.base')

@section('content')

<div>
    <h1 class="text-4xl font-extrabold text-gray-900">Catalogue</h1>
    <div class="grid grid-cols-3 gap-4 mt-8">
        @foreach($products as $product)
            <a href="{{ route('catalogue.detail', $product->id) }}">
                <div class="bg-white shadow p-4 rounded">
                    <img src="{{ $product->image_path }}" alt="{{ $product->name }}" class="w-full h-32 object-cover">
                    <div class="font-bold text-lg">{{ $product->name }}</div>
                    <div class="text-gray-700">{{ $product->description }}</div>
                    {{-- <a href="{{ route('cart.add', $product->id)}}">Add to Cart</a> --}}
                </div>
            </a>
        @endforeach
    </div>
</div>

@endsection