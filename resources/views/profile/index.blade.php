@extends('layouts.base')

@section('content')
    @if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded-lg mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="max-w-2xl mx-auto bg-white shadow-lg rounded-lg p-6 mt-10">
        <h1 class="text-2xl font-bold text-gray-800 mb-4 text-center">Profiel</h1>
        <div class="border-t border-gray-200 pt-4 space-y-2">
            <p class="text-lg text-gray-600"><strong>Naam:</strong> <span class="text-gray-800">{{ Auth::user()->name }}</span></p>
            <p class="text-lg text-gray-600"><strong>Email:</strong> <span class="text-gray-800">{{ Auth::user()->email }}</span></p>
        </div>
        <div class="mt-6 text-center">
            <a href="{{ route('profile.edit') }}" class="inline-block bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg shadow">
                Profiel bewerken
            </a>
            <form method="POST" action="{{ route('profile.destroy') }}" onsubmit="return confirm('Weet je zeker dat je je account wilt verwijderen? Dit kan niet ongedaan worden gemaakt.');">
                @csrf
                @method('DELETE')
            
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg shadow">
                    Verwijder account
                </button>
            </form>
            
        </div>
    </div>
@endsection
