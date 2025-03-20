@extends('layouts.base')

@section('content')
@if(session('success'))
<div class="bg-green-500 text-white p-3 rounded-lg mb-4">
    {{ session('success') }}
</div>
@endif

<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-2xl w-full bg-white shadow-lg rounded-lg overflow-hidden">
        @if($product->image_path)
            <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-auto max-w-sm mx-auto">
        @endif
    </div>
    <div class="p-4">
        <h2 class="text-3xl font-bold text-gray-900">{{ $product->name }}</h2>
        <p class="text-lg text-gray-700 mt-1">Gemaakt door:
            <span class="font-medium text-gray-900">{{ $product->maker->name }}</span>
            <a href="{{ route('makers.portfolio', $product->maker->id) }}"
                class="text-blue-500 hover:underline ml-2">Bekijk portfolio</a>
        </p>
        <p class="mt-4 text-gray-600 leading-relaxed">{{ $product->description }}</p>
        <div class="mt-4">
            <h3 class="text-xl font-semibold text-gray-900">Specificaties</h3>
            <ul class="mt-2 text-gray-600">
                <li><strong>Unieke Kenmerken:</strong> {{ $product->unique_features }}</li>
                <li><strong>Duurzaamheid:</strong>
                    @for ($i = 1; $i <= 10; $i++) @if ($i <=$product->durability)
                        <span class="text-green-500">&#9733;</span>
                        @else
                        <span class="text-gray-300">&#9733;</span>
                        @endif
                    @endfor
                </li>
                <li><strong>Type:</strong> {{ $product->type }}</li>
                <li><strong>Materiaalgebruik:</strong> {{ $product->material_usage }}</li>
                <li><strong>Productietijd:</strong> {{ $product->production_time }} uur</li>
                <li><strong>Complexiteit:</strong>
                    @for ($i = 1; $i <= 5; $i++) @if ($i <=$product->complexity)
                        <span class=" 
                                    @if ($product->complexity == 5) text-red-500
                                    @elseif ($product->complexity == 4) text-orange-500
                                    @elseif ($product->complexity == 3) text-yellow-500
                                    @elseif ($product->complexity == 2) text-green-500
                                    @else text-blue-500
                                    @endif
                                ">&#9733;</span>
                    @else
                    <span class="text-gray-300">&#9733;</span>
                    @endif
                    @endfor
                </li>
            </ul>
        </div>
        <div class="flex justify-between items-center mt-4">
            <span class="text-2xl text-gray-900">€{{ number_format($product->price, 2, ',', '.') }}</span>
            <a href="{{ route('products.index') }}" class="text-blue-500 hover:underline">Terug naar overzicht</a>
        </div>

        <!-- Alleen als de gebruiker de eigenaar is, geef de knoppen weer -->
        @if(auth()->check() && auth()->user()->id === $product->user_id)
        <div class="flex justify-between mt-4">
            <!-- Bewerken -->
            <a href="{{ route('products.edit', $product->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">
                Bewerken
            </a>
            
            <!-- Verwijderen -->
            <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Weet je zeker dat je dit product wilt verwijderen?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                    Verwijderen
                </button>
            </form>
            <div class="mt-8">
                <h3 class="text-xl font-semibold text-gray-900">Reviews</h3>
                @if($product->reviews->isEmpty())
                    <p class="text-gray-600 mt-2">Er zijn nog geen reviews voor dit product.</p>
                @else
                    <ul class="mt-2 text-gray-600">
                        @foreach($product->reviews as $review)
                            <li class="border-t border-gray-200 pt-4 mt-4">
                                <div class="flex items-center">
                                    <div class="text-sm">
                                        @if($review->buyer)
                                            <p class="font-medium text-gray-900">{{ $review->buyer->name }}</p>
                                        @else
                                            <p class="font-medium text-gray-900">Unknown Buyer</p>
                                        @endif
                                        <p class="text-gray-500">{{ $review->created_at->format('d-m-Y') }}</p>
                                    </div>
                                </div>
                                <div class="mt-2 text-gray-700">
                                    <p>{{ $review->content }}</p>
                                </div>
                                <div class="mt-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $review->rating)
                                            <span class="text-yellow-500">&#9733;</span>
                                        @else
                                            <span class="text-gray-300">&#9733;</span>
                                        @endif
                                    @endfor
                                </div>
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
