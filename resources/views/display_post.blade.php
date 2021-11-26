@extends('home')

@section('content')
    <div class="container m-auto">
        <div class="container mx-auto flex flex-wrap flex justify-center items-center">
            <div class="w-3/5">
                <!-- Shows post content -->
                @if(!empty($post->image))
                    <img class="mx-auto w-full" src="{{ asset('storage/'.$post->image) }}"/>
                @endif
                <div class="bg-indigo-900 p-4 mb-6 h-full w-full text-white rounded-b-3xl">
                    <h2 class="text-3xl text-center">{{ $post->title }}</h2>
                </div>
                <div class="text-center text-xl text-blue-600 p-4">
                    @foreach($post->tag as $tag)
                        <a href="/tags/{{$tag->name}}">
                            #{{ $tag->name }}
                        </a>
                    @endforeach
                </div>
                <p class="text-xl">@php echo ($post->description); @endphp</p>
                <div class="flex flex-row justify-between">
                    <div class="flex flex-row justify-between">
                        <form action="{{ url('like/'.$post->id) }}" method="POST" class="p-4" id="likeform">
                            @csrf
                            @method('PUT')
                            <button type="submit">
                                @if($liked)
                                    <i class="fas fa-thumbs-up fa-lg"></i>
                                @else
                                    <i class="far fa-thumbs-up fa-lg"></i>
                                @endif
                                <span class="text-lg">{{ $post->likes }}</span>
                                <input type="hidden" class="hidden" name="post_id" value="{{ $post->id }}"/>
                            </button>
                        </form>
                        <form action="{{ url('dislike/'.$post->id) }}" method="POST" class="p-4">
                            @csrf
                            @method('PUT')
                            <button type="submit">
                                @if($disliked)
                                    <i class="fas fa-thumbs-down fa-lg"></i>
                                @else
                                    <i class="far fa-thumbs-down fa-lg"></i>
                                @endif
                                <span class="text-lg">{{ $post->dislikes }}</span>
                            </button>
                        </form>
                    </div>
                    <div class="">
                        <p class="text-gray-900 capitalize text-right">{{ $post->user->name }}</p>
                        <p class="text-gray-600">{{ date('d-m-Y', strtotime($post->created_at)) }}</p>
                    </div>
                </div>
                <!-- Comment section -->
                <div class="container p-4 mt-8 bg-gray-100 rounded-t-3xl" id="comments">
                    <p class="text-xl text-center text-white rounded-t-3xl bg-indigo-900 p-4 shadow-lg">
                        Komentarze
                        @if(!Auth::check())
                            (<a href="{{ route('login') }}" class="underline">Zaloguj się</a> aby dodać komentarz)
                        @endif
                        @foreach ($errors->get('content') as $message)
                            <span class="text-red-600">{{ $message }}</span>
                        @endforeach
                    </p>
                    <!-- If logged in, displays form for submitting a comment -->
                    @if(Auth::check())
                        <form action="{{ route('comment.add') }}" method="post" class="pt-4">
                            @csrf
                            <div class="flex">
                                <input type="text" name="content" placeholder="Twój komentarz" class="w-5/6 inline rounded-l-full shadow-lg"/>
                                <input type="submit" name="submit" value="Dodaj komentarz" class="w-1/6 inline rounded-r-full hover:bg-gray-300 shadow-lg"/>
                                <input type="hidden" class="hidden" name="post_id" value="{{ $post->id }}"/>
                                <input type="hidden" class="hidden" name="author_id" value="{{ Auth::id() }}"/>
                                <input type="hidden" class="hidden" name="slug" value="{{ $post->slug }}"/>
                            </div>
                        </form>
                    @endif
                    <!-- If admin, displays form for deleting comments -->
                    @if($permission == 'admin')
                    <form action="{{ route('comment.delete') }}" method="POST">
                        @csrf
                    @endif
                    <!-- Show comments -->
                    @foreach ($comments->reverse() as $comment)
                        <div class="flex p-4">
                            <div class="w-4/6">
                                <p class="capitalize font-bold">{{ $comment->user->name }}</p>
                                <p class="w-full break-words">{{ $comment->content }}</p>
                            </div>
                            @if($permission == 'admin')
                                <div class="w-1/6 text-right">{{ date('d-m-Y', strtotime($post->created_at)) }}</div>
                                <div class="w-1/6 text-right">
                                    <input type="checkbox" name="delete[]" value="{{ $comment->id }}"/>
                                </div>
                            @else
                                <div class="w-2/6 text-right">{{ date('d-m-Y', strtotime($post->created_at)) }}</div>
                            @endif
                        </div>
                        <hr/>
                    @endforeach
                </div>
                @if($permission == 'admin')
                    <input class="float-right p-4 mt-8 rounded-tl-xl shadow-lg hover:bg-gray-300" type="submit" name="submit" value="Usuń wybrany komentarz"/>
                    <input type="hidden" class="hidden" name="slug" value="{{ $post->slug }}"/>
                </form>
                @endif
            </div>
        </div>
    </div>
@endsection