<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>MakersMarkt</title>
</head>
<body class="bg-violet-100 min-h-screen">

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
                    <li><a href="/profile" class="hover:text-indigo-600">Profile</a></li>
                    <li><a href="{{ route('cart.index') }}" class="hover:text-indigo-600">Cart</a></li>
                    @if(Auth::check() && Auth::user()->is_moderator)
                        <li><a href="/dashboard" class="hover:text-indigo-600">Dashboard</a></li>
                    @endif
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

    <main class="mb-20">
        @yield('content')
    </main>

    <footer class="bg-black text-center text-blue-200 py-2 w-full fixed bottom-0">
        &copy; 1957 MarkMaker
    </footer>

</body>
</html>
