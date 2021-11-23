<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- TinyMCE -->
    <script src="https://cdn.tiny.cloud/1/pqh1agigvkv547khuf7xyehg024sk75vqh0i7zixj59yqc5e/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: '#post_content',
            menu:{
                file: {title: 'File', items: 'newdocument'},
                edit: {title: 'Edit', items: 'undo redo | cut copy paste pastetext | selectall'},
                insert: {title: 'Insert', items: 'image link media template codesample'},
                format: {title: 'Format', items: 'bold italic underline'},
            },
            setup:function(ed)
            {
                ed.on('change', function(e) {
                    this.execCommand("fontSize", false, "24px");
                });
            },
        });
    </script>
</head>
<body class="flex flex-col min-h-screen">
    <nav id="header" class="w-full z-30 top-0 bg-gray-800 text-white p-4">
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 py-2">
            <p class="text-left">
                <a href="{{ route('start') }}" class="no-underline hover:underline p-4" >Strona Główna</a>
                {{ @csrf_token() }}
            </p>
            <p class="text-right">
                @auth
                    @if(Auth::user()->permission_id == 1)
                        <a href="{{ route('dashboard') }}" class="no-underline hover:underline p-4">Panel administratora</a>
                    @endif
                        <a href="{{ route('settings') }}" class="no-underline hover:underline p-4">Ustawienia</a>
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
    <div class="flex-auto">
        @yield('content')
    </div>
    <footer id="footer" class="w-full z-30 top-0 bg-gray-800 text-white text-center p-6">
        <p class="inline text-center">Blog &copy2021</p>
    </footer>
</body>
</html>