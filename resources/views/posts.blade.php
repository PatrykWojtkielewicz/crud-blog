@extends('home')

@section('content')
    @foreach ($dane as $index )
        <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('/img/card-left.jpg')" title="Woman holding a mug">
        </div>
        <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
            <div class="mb-8">
                <div class="text-gray-900 font-bold text-xl mb-2">{{ $index->title }}</div>
                <p class="text-gray-700 text-base">{{ $index->description }}</p>
            </div>
            <div class="text-right">
                <div class="text-sm">
                    <p class="text-gray-900 leading-none">{{ $index->user_id}}</p>
                    <p class="text-gray-600">{{ $index->created_at }}</p>
                </div>
            </div>
            <hr/>
        </div>
    @endforeach
@endsection