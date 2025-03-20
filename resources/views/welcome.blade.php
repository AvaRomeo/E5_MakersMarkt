@extends('layouts.base')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-violet-100 py-12 px-4 sm:px-6 lg:px-8">
    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded-lg mb-4 text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8">
            <div class="text-center">
                <h1 class="text-4xl font-extrabold text-gray-900 border-b-2 border-pink-400">
                    Welcome to MarkMaker
                </h1>
            </div>

            @auth
                @if (auth()->user()->is_moderator == 1)
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Looged In!</strong>
                        <span class="block sm:inline">You are looged in as admin.</span>
                    </div>
                @else
                    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded relative" role="alert">
                        <strong class="font-bold">Looged In!</strong>
                        <span class="block sm:inline">You are looged in.</span>
                    </div>
                @endif
            @endauth
        </div>
    </div>
@endsection
