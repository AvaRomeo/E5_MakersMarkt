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

    <header class="bg-white shadow">
        <nav class="container mx-auto px-4 py-3 flex justify-between items-center">
            <div class="font-bold text-xl">
                MakersMarkt
            </div>
            <ul class="flex space-x-4">
                <li><a href="/" class="hover:text-indigo-600">Home</a></li>
                <li><a href="/register" class="hover:text-indigo-600">Register</a></li>
                @if(Auth::check())
                    <li><a href="/logout" class="hover:text-indigo-600">Loogoot</a></li>
                @else
                    <li><a href="/login" class="hover:text-indigo-600">Loogin</a></li>
                @endif
            </ul>
        </nav>
    </header>

    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white py-4 text-center">
        <p>&copy; {{ date('Y') }} MakersMarkt. All rights reserved.</p>
    </footer>

</body>
</html>