@extends('home')

@section('content')
    <div class="container m-auto justify-center flex h-screen items-center">
        <div class="max-w-xs text-center">
            <form action="{{ route('login.store') }}" method="POST" class="w-full max-w-sm" >
                @csrf
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Nazwa użytkownika
                    </label>
                    </div>
                    <div class="md:w-2/3">
                    <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" name="user_name" type="text"/>
                    @foreach ($errors->get('user_name') as $message)
                        <span class="text-red-600">{{ $message }}</span>
                    @endforeach
                    </div>
                </div>
                <div class="md:flex md:items-center mb-6">
                    <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                        Hasło
                    </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-password" name="user_password" type="password"/>
                        @foreach ($errors->get('user_password') as $message)
                            <span class="text-red-600">{{ $message }}</span>
                        @endforeach
                    </div>
                </div>
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                    <input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" value="Zaloguj" name="submit" type="submit">
                    </div>
                </div>
                </form>
            </div>
    </div>
@endsection