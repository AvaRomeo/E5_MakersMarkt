@extends('layouts.base')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Shopping Cart</h1>
    @if(session('success'))
        <p class="text-green-500 mb-4">{{ session('success') }}</p>
    @endif
    @if($cart)
        <table class="min-w-full bg-white border border-gray-200 mt-6">
            <thead>
            <tr>
                <th class="py-2 px-4 border-b text-center">Product</th>
                <th class="py-2 px-4 border-b text-center">Price</th>
                <th class="py-2 px-4 border-b text-center">Quantity</th>
                <th class="py-2 px-4 border-b text-center">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($cart as $id => $product)
                <tr>
                <td class="py-2 px-4 border-b text-center">{{ $product['name'] }}</td>
                <td class="py-2 px-4 border-b text-center">€{{ number_format($product['price'], 2) }}</td>
                <td class="py-2 px-4 border-b text-center">{{ $product['quantity'] }}</td>
                <td class="py-2 px-4 border-b text-center">
                    <a href="{{ route('cart.remove', $id) }}" class="text-red-500 hover:underline">Remove</a>
                </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-4 flex justify-between items-center">
            <div>
            <a href="{{ route('cart.clear') }}" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-600 mr-2">Clear Cart</a>
            <a href="{{ route('catalogue.index') }}" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Back to Catalogue</a>
            </div>
            <p class="text-xl font-bold">Total: €{{ number_format($total, 2, ',', '.') }}</p>
        </div>

    @else
        <p class="text-gray-500">Your cart is empty.</p>
    @endif
@endsection
