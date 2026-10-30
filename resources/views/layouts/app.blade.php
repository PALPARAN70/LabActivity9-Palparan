<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Bakuna Tracker')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen flex flex-col bg-clinic-50 text-ink antialiased">

    {{-- NAV --}}
    <nav class="bg-gradient-to-r from-clinic-700 to-clinic-500 text-white shadow-md">
        <div class="max-w-6xl mx-auto px-4 py-3 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
            <a href="/dashboard" class="flex items-center gap-2 text-lg font-bold">
                <span class="grid h-8 w-8 place-items-center rounded-full bg-white/20">💉</span>
                Bakuna Tracker
            </a>

            <div class="flex flex-wrap items-center gap-2 text-sm">
                @auth
                    <a href="/dashboard"
                       class="rounded-full px-3 py-1 {{ request()->is('dashboard') ? 'bg-white text-clinic-700 font-semibold' : 'hover:bg-white/15' }}">
                        Dashboard
                    </a>
                    <a href="/schedule"
                       class="rounded-full px-3 py-1 {{ request()->is('schedule') ? 'bg-white text-clinic-700 font-semibold' : 'hover:bg-white/15' }}">
                        Schedule
                    </a>

                    <span class="px-2 text-clinic-100">Hi, {{ auth()->user()->name }}</span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="rounded-full border border-white/40 px-3 py-1 hover:bg-white hover:text-clinic-700">
                            Logout
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}" class="rounded-full px-3 py-1 hover:bg-white/15">Sign in</a>
                @endguest
            </div>
        </div>
    </nav>

    {{-- PAGE CONTENT --}}
    <main class="max-w-6xl mx-auto w-full flex-1 px-4 py-6 sm:py-8">
        @yield('content')
    </main>

    {{-- FOOTER --}}
    <footer class="border-t border-clinic-200 bg-white/70 py-4 text-center text-xs text-clinic-700 sm:text-sm">
        Barangay Matina Crossing Health Center · Davao City
    </footer>

</body>
</html>