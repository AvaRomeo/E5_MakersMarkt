@extends('layouts.base')

    @section('content')
        <h1>Login</h1>
        <p>Please login to access the dashboard</p>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{route('login')}}">
            @csrf
            <label for="email">Email:</label>
            <input type="text" name="email" required autofocus>

            <label for="password">Password:</label>
            <input type="password" name="password" required>

            <button type="submit">Loogin</button>
        </form>
    @endsection
