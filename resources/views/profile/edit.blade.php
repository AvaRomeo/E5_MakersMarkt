@extends('layouts.base')

@section('content')
    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-6 text-center">Profiel bewerken</h1>


        <form method="POST" action="{{ route('profile.update', Auth::user()->id) }}">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="name">Naam</label>
                <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" 
                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" 
                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="password">Nieuw wachtwoord (optioneel)</label>
                <input type="password" name="password" id="password" 
                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
                @error('password')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-gray-700 font-bold mb-2" for="password_confirmation">Bevestig wachtwoord</label>
                <input type="password" name="password_confirmation" id="password_confirmation" 
                       class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mt-6 text-center">
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow">
                    Opslaan
                </button>
                <a href="{{ route('profile.index') }}" class="text-gray-600 ml-4">Annuleren</a>
            </div>
        </form>
    </div>
@endsection
