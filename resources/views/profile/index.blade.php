@extends('layouts.base')

@section('content')
    @if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded-lg mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">Profile</h1>
        <div class="border-t border-gray-200 pt-4 space-y-2">
            <p class="text-lg text-gray-600"><strong>Name:</strong> <span class="text-gray-800">{{ Auth::user()->name }}</span></p>
            <p class="text-lg text-gray-600"><strong>Email:</strong> <span class="text-gray-800">{{ Auth::user()->email }}</span></p>
        </div>
        <div class="mt-8">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Own Products</h2>
            <ul class="list-disc list-inside space-y-2">
            @if($products->isEmpty())
                <li class="text-gray-600">No products</li>
            @else
                @foreach($products as $product)
                <li class="text-gray-800">{{ $product->name }}</li>
                @endforeach
            @endif
            </ul>
        </div>
        <div class="mt-6 text-center">
            <!-- Edit button -->
            <a href="{{ route('profile.edit') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow">
                Edit Profile
            </a>

            <!-- Delete button -->
            <form method="POST" action="{{ route('profile.destroy') }}" class="inline-block" onsubmit="return confirm('Are you sure you want to delete your account? This cannot be undone.');">
                @csrf
                @method('DELETE')
            
                <button type="submit" class="inline-block bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow ml-4">
                    Delete Account
                </button>
            </form>
        </div>
    </div>
@endsection
