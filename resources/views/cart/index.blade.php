@extends('layouts.app')

@section('content')
    <h1>Shopping Cart</h1>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    @if($cart)
        <table border="1">
            <tr>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Actions</th>
            </tr>
            @foreach($cart as $id => $product)
                <tr>
                    <td>{{ $product['name'] }}</td>
                    <td>${{ number_format($product['price'], 2) }}</td>
                    <td>{{ $product['quantity'] }}</td>
                    <td>
                        <a href="{{ route('cart.remove', $id) }}">Remove</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <a href="{{ route('cart.clear') }}">Clear Cart</a>
    @else
        <p>Your cart is empty.</p>
    @endif
@endsection
