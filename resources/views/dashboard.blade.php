@extends('home')

@section('content')
    <div class="container m-auto">
        <div class="w-full grid grid-cols-5">
            <div class="px-4">
                <div class="sticky top-0 p-4 w-full h-full">
                    <div class="inline-table list-disc">
                        <li>
                            <a href="{{ route('new_post') }}" class="no-underline hover:underline p-2">Dodaj Post</a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.posts') }}" class="no-underline hover:underline p-2">Przeglądaj posty</a>
                        </li>
                        <li>
                            <a href="{{ route('dashboard.users') }}" class="no-underline hover:underline p-2">Przeglądaj użytkowników</a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="pt-1 px-3 col-span-5 xl:col-span-4">
                @yield('dashboard_content')
            </div>
        </div>
    </div>
@endsection
