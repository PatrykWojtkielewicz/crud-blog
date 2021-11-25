@extends('home')

@section('content')
    <div class="container m-auto">
        @foreach ($posts->reverse() as $post )
            @if($post->active == "1")
                <div class="container w-100 lg:w-4/5 mx-auto flex flex-col">
                    <div v-for="card in cards" class="flex flex-col md:flex-row overflow-hidden bg-white rounded-lg shadow-md mt-4 w-100 mx-2 hover:shadow-xl">
                        @if(!empty($post->image))
                            <div class="h-64 w-auto md:w-1/3">
                                <a href="{{ route('post.show', ['post' => $post->slug]) }}">
                                    <img class="inset-0 h-full w-full object-cover object-center" src="{{ asset('storage/'.$post->image) }}" />
                                </a>
                            </div>
                        @endif
                        <div class="w-full py-4 px-6 md:w-full text-gray-800 flex flex-col justify-between">
                            <div class="">
                                <span>
                                    <a href="{{ route('post.show', ['post' => $post->slug]) }}" class="font-semibold text-lg leading-tight truncate no-underline hover:underline">{{ $post->title}}</a>
                                </span>
                                <p class="text-blue-600">
                                    @foreach($post->tag as $tag)
                                        <a href="/tags/{{$tag->name}}">
                                            #{{ $tag->name }}
                                        </a>
                                    @endforeach
                                </p>
                            </div>
                            <p class="mt-2">
                                {{ str_replace(["&nbsp;","&lt;"], "",strip_tags(implode(' ', array_slice(explode(' ', $post->description), 0, 80))."...")) }}
                            </p>
                            <div class="mt-2 flex flex-row justify-between">
                                <p class="mr-auto">
                                    <i class="far fa-thumbs-up fa-lg"></i>
                                    <span class="text-lg">{{ $post->likes }}</span>
                                    <i class="far fa-thumbs-down fa-lg pl-2"></i>
                                    <span class="text-lg">{{ $post->dislikes }}</span>
                                </p>
                                <p class="text-gray-900 capitalize">{{ $post->user->name }},&nbsp;</p>
                                <p class="text-gray-600">{{ date('d-m-Y', strtotime($post->created_at)) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
@endsection