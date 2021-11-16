@extends('home')

@section('content')
    <div class="container m-auto">
        @foreach ($dane->reverse() as $index )
        <div id="cards">
            <div class="container w-100 lg:w-4/5 mx-auto flex flex-col">
              <div v-for="card in cards" class="flex flex-col md:flex-row overflow-hidden bg-white rounded-lg shadow-xl mt-4 w-100 mx-2">
                <div class="h-64 w-auto md:w-1/3">
                  <img class="inset-0 h-full w-full object-cover object-center" src="{{asset('images/'.$index->image)}}" />
                </div>
                <div class="w-full py-4 px-6 md:w-2/3 text-gray-800 flex flex-col justify-between">
                  <a class="font-semibold text-lg leading-tight truncate no-underline hover:underline" href="">{{ $index->title}}</a>
                  <p class="mt-2">
                    <?php 
                        echo(substr($index->description, 0, 400)."...");
                    ?>
                  </p>
                  <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
                      <?php
                          $author_id = $index->user_id;
                          $author_name = DB::table('users')->where('id', '=', $author_id)->value('name');
                      ?>
                      <p class="text-gray-900 leading-none text-right">{{ $author_name }}</p>
                      <?php
                          $created_at = $index->created_at;
                          $date = $created_at->year."-".$created_at->month."-".$created_at->day;
                      ?>
                      <p class="text-gray-600 text-right">{{ $date }}</p>
                  </p>
                </div>
              </div>
            </div>
          </div>
        @endforeach
    </div>
@endsection