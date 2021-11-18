<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <nav id="header" class="w-full z-30 top-0 bg-gray-200">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
            <p class="text-left">
                <a href="{{ route('start') }}" class="no-underline hover:underline p-4" >Strona Główna</a>
            </p>
            <p class="text-right">
                @auth
                    <a href="{{ route('dashboard') }}" class="no-underline hover:underline p-4">Panel Użytkownika</a>
                    <a href="{{ url('/logout') }}" class="no-underline hover:underline p-4">Wyloguj</a>
                @else
                    <a href="{{ route('login') }}" class="no-underline hover:underline p-4">Zaloguj</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="no-underline hover:underline p-4">Zarejestruj</a>
                    @endif
                @endauth
            </p>
        </div>
    </nav>
    @yield('content')  
</body>
</html>