<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>MakersMarkt</title>
</head>
<body class="bg-gray-100">

    <header class="bg-yellow-100 shadow">
        <nav class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="font-bold text-xl">
            <a href="/">MARKMAKER</a>
            </div>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:text-indigo-600">Home</a></li>
                <li><a href="/products" class="hover:text-indigo-600">Products</a></li>

            @if(Auth::check())
                <li><a href="/catalogue" class="hover:text-indigo-600">Catalogue</a></li>
            @endif
            @if(Auth::check())
                <li><a href="/profile" class="hover:text-indigo-600">Profile</a></li>
                <li><a href="{{ route('cart.index') }}" class="hover:text-indigo-600">Cart</a></li>
                @if(Auth::check() && Auth::user()->is_moderator)
                <li><a href="/dashboard" class="hover:text-indigo-600">Dashboard</a></li>
            @endif
                <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="hover:text-indigo-600">Loogoot</button>
                </form>
            @else
                <li><a href="/register" class="hover:text-indigo-600">Register</a></li>
                @if(Auth::check())
                    <li><a href="/profile" class="hover:text-indigo-600">Profile</a></li>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="hover:text-indigo-600">Loogout</button>
                    </form>
                @else
                    <li><a href="/register" class="hover:text-indigo-600">Register</a></li>
                    <li><a href="/login" class="hover:text-indigo-600">Loogin</a></li>
                @endif
            </ul>
        </nav>
    </header>

    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-4 text-center">
        <p>&copy; {{ date('Y') }} MarkMaker. All rights reserved.</p>
    </footer>

</body>
</html>
