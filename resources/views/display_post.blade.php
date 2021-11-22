@extends('home')

@section('content')
    <div class="container m-auto">
        <div class="container mx-auto flex flex-wrap py-6 flex justify-center items-center">
            <div class="w-3/5">
                @if(!empty($post->image))
                    <img class="mx-auto p-4 w-full" src="{{ asset('storage/'.$post->image) }}"/>
                @endif
                <h2 class="text-6xl p-4 text-center">{{ $post->title }}</h2>
                <p class="font-xl">@php echo ($post->description); @endphp</p>
            </div>
        </div>
    </div>
@endsection