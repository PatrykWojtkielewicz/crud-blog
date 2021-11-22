@extends('home')

@section('content')
    <div class="container m-auto">
        <div class="container mx-auto flex flex-wrap py-6 flex justify-center items-center">
            <div class="w-3/5">
                @if(!empty($post->image))
                    <img class="mx-auto p-4 w-full" src="{{ asset('storage/'.$post->image) }}"/>
                @endif
                <h2 class="text-6xl p-4 text-center">{{ $post->title }}</h2>
                <p class="text-xl">@php echo ($post->description); @endphp</p>
                <p class="text-right">{{ $author }}</p>
                @php
                    $created_at = $post->created_at;
                    $date = $created_at->year."-".$created_at->month."-".$created_at->day;
                @endphp
                <p class="text-right">{{ $date }}</p>
                <div class="container p-4">
                    <p class="text-xl text-center">
                        Komentarze
                        @foreach ($errors->get('content') as $message)
                            <span class="text-red-600">{{ $message }}</span>
                        @endforeach
                    </p>
                    @if(Auth::check())
                        <form action="{{ route('comment.add') }}" method="post">
                            @csrf
                            <div class="flex">
                                <input type="text" name="content" placeholder="Twój komentarz" class="w-5/6 inline rounded-l-full"/>
                                <input type="submit" name="submit" value="Wstaw komentarz" class="w-1/6 inline rounded-r-full"/>
                                <input type="hidden" class="hidden" name="post_id" value="{{ $post->id }}"/>
                                <input type="hidden" class="hidden" name="author_id" value="{{ Auth::id() }}"/>
                                <input type="hidden" class="hidden" name="slug" value="{{ $post->slug }}"/>
                            </div>
                        </form>
                    @endif
                    @foreach ($comments as $comment)
                        @php
                            $created_at = $comment->created_at;
                            $date = $created_at->year."-".$created_at->month."-".$created_at->day;
                            foreach($users as $user){
                                if($comment->user_id == $user->id){
                                    $username = $user->name;
                                }
                            }
                        @endphp
                        <div class="flex p-4">
                            <div class="w-5/6">
                                <p class="capitalize font-bold">{{ $username }}</p>
                                <p class="w-full break-words">{{ $comment->content }}</p>
                            </div>
                            <div class="w-1/6 text-right">{{ $date }}</div>
                        </div>
                        <hr/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection