@extends('home')

@section('content')
    <div class="container m-auto">
        @foreach ($posts->reverse() as $post )
            @if($post->active == "1")
                <div id="cards">
                    <div class="container w-100 lg:w-4/5 mx-auto flex flex-col">
                        <div v-for="card in cards" class="flex flex-col md:flex-row overflow-hidden bg-white rounded-lg shadow-xl mt-4 w-100 mx-2">
                            @if(!empty($post->image))
                              <div class="h-64 w-auto md:w-1/3">
                                <img class="inset-0 h-full w-full object-cover object-center" src="{{ asset('storage/'.$post->image) }}" />
                              </div>
                            @endif
                            <div class="w-full py-4 px-6 md:w-full text-gray-800 flex flex-col justify-between">
                                <a class="font-semibold text-lg leading-tight truncate no-underline hover:underline" href="">{{ $post->title}}</a>
                                <p class="mt-2">
                                  {{ str_replace(["&nbsp;","&lt;"], "",strip_tags(implode(' ', array_slice(explode(' ', $post->description), 0, 80))."...")) }}
                                </p>
                                <p class="text-sm text-gray-700 uppercase tracking-wide font-semibold mt-2">
                                    <p class="text-gray-900 leading-none text-right">
                                      @foreach($users as $user)
                                        @if($user->id == $post->user_id)
                                          {{ $user->name }}
                                        @endif
                                      @endforeach
                                    </p>
                                    <?php
                                        $created_at = $post->created_at;
                                        $date = $created_at->year."-".$created_at->month."-".$created_at->day;
                                    ?>
                                    <p class="text-gray-600 text-right">{{ $date }}</p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection