<!DOCTYPE html>
<html lang="en">
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
                <a href="{{ route('new_post') }}" class="no-underline hover:underline p-4" >Nowy post</a>
            </p>
            <p class="text-right">
                @if(empty(session()->get('UserId')))
                    <a href="{{ route('login.create') }}" class="no-underline hover:underline p-4" >Zaloguj</a>
                    <a href="{{ route('registration.create') }}" class="no-underline hover:underline p-4" >Zarejestruj</a>
                @else
                    <?php
                        $user_id = session()->get('UserId');
                        $user_name = DB::table('users')->where('id', '=', $user_id)->value('name');
                        echo("Witaj, ".$user_name);
                    ?>
                    <a href="{{ route('login.logout') }}" class="no-underline hover:underline p-4" >Wyloguj</a>
                @endif
            </p>
        </div>
    </nav>
    @yield('content')  
</body>
</html>