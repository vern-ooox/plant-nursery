<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Plant Nursery')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-900">
    <nav class="bg-green-800 p-4 text-white">
        <a href="{{ route('plants.index') }}" class="font-bold">Plant Nursery</a>

        @auth
            <span class="ml-4">{{ auth()->user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" class="inline">
                @csrf
                <button class="ml-4 underline">Log out</button>
            </form>
        @endauth
    </nav>

    <main class="mx-auto max-w-5xl p-6">
        @if (session('success'))
            <div class="mb-4 rounded bg-green-100 p-3">{{ session('success') }}</div>
        @endif

        @yield('content')
    </main>
</body>
</html>