@extends('layouts.base')
    @section('content')
        <div class="min-h-screen flex items-center justify-center bg-violet-50 py-12 px-4 sm:px-6 lg:px-8">
            <div class="max-w-md w-full space-y-8">
                <div class="text-center">
                    <h1 class="text-4xl font-extrabold text-gray-900">
                        Welcome to MarkMaker
                    </h1>
                    <img src="Mark-Rutte.png" alt="yay">
                    <p>you are moderator!!!</p>

                    <ul class="mt-4">
                        @foreach($products as $product)
                            <li class="border-b py-2">
                                <h2 class="text-xl font-semibold">{{ $product->name }}</h2>
                                <p class="text-gray-700">{{ $product->description }}</p>
                                <span class="text-gray-900 font-bold">${{ $product->price }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endsection
