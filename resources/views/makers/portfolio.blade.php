@extends('layouts.base')

@section('content')

<div class="container mx-auto p-4">
    <h2 class="text-2xl font-bold mb-4">Portfolio of: {{$user->name}}</h2>

    <div class="bg-white shadow-md rounded-lg p-6 mb-6">
        <p class="text-lg font-semibold">Name: {{$user->name}}</p>
        <p class="text-lg">Email: {{$user->email}}</p>
    </div>

    <h3 class="text-xl font-semibold mb-4">Products</h3>
    <ul class="space-y-4">
        @foreach($products as $product)
            <li class="bg-white shadow-md rounded-lg p-4">
                <p class="text-lg font-semibold">{{ $product->name }}</p>
                <p>{{ $product->description }}</p>
            </li>
        @endforeach
    </ul>
</div>

@endsection