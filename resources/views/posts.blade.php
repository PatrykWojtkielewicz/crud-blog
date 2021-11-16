@extends('home')

@section('content')
    <div class="container m-auto">
        @foreach ($dane as $index )
            <div class="h-48 lg:h-auto lg:w-48 flex-none bg-cover rounded-t lg:rounded-t-none lg:rounded-l text-center overflow-hidden" style="background-image: url('/img/card-left.jpg')" title="Woman holding a mug">
            </div>
            <div class="bg-white rounded-b lg:rounded-b-none lg:rounded-r p-4 flex flex-col justify-between leading-normal">
                <div class="mb-8">
                    <div class="text-gray-900 font-bold text-xl mb-2">{{ $index->title }}</div>
                    <p class="text-gray-700 text-base">{{ $index->description }}</p>
                </div>
                <div class="text-right">
                    <div class="text-md">
                        <?php
                            $author_id = $index->id;
                            $author_name = DB::table('users')->where('id', '=', $author_id)->value('name');
                        ?>
                        <p class="text-gray-900 leading-none">{{ $author_name }}</p>
                        <?php
                            $created_at = $index->created_at;
                            $date = $created_at->year."-".$created_at->month."-".$created_at->day;
                        ?>
                        <p class="text-gray-600">{{ $date }}</p>
                    </div>
                </div>
                <hr/>
            </div>
        @endforeach
    </div>
@endsection