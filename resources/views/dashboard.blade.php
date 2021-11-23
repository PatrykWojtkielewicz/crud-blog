@extends('home')

@section('content')
    <div class="container m-auto">
        <div class="w-full flex flex-col sm:flex-row flex-wrap sm:flex-nowrap py-4 flex-grow">
            <div class="w-1/4 px-4">
                <div class="sticky top-0 p-4 w-full h-full">
                    <ul class="list-disc">
                        <li>
                            <a href="{{ route('new_post') }}" class="no-underline hover:underline p-2">Dodaj Post</a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.posts') }}" class="no-underline hover:underline p-2">Przeglądaj posty</a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.users') }}" class="no-underline hover:underline p-2">Przeglądaj użytkowników</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full pt-1 px-3">
                @yield('dashboard_content')
            </div>
        </div>
    </div>
@endsection
