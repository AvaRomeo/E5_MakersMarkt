@extends('layouts.base')

    @section('content')
        <h1>Welcome to MakersMarkt</h1>
        @auth
            @if (auth()->user()->id == 2)
                <p>looged in</p>
            @endif
        @endauth
    @endsection
