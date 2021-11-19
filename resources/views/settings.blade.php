@extends('home')

@section('content')
    <div class="container m-auto">
        <div class="w-full flex flex-col sm:flex-row flex-wrap sm:flex-nowrap py-4 flex-grow">
            <div class="w-1/4 flex-shrink flex-grow-0 px-4">
                <div class="sticky top-0 p-4 w-full h-full">
                    <ul class="list-disc">
                        <li>
                            <a href="{{ route('password.reset', ['token' => csrf_token()]) }}" class="no-underline hover:underline p-2">Zmień hasło</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="w-full flex-grow pt-1 px-3">
                
            </div>
        </div>
    </div>
@endsection
