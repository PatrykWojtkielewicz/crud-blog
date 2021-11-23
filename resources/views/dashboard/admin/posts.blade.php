@extends('dashboard')

@section('dashboard_content')
    <div class="container m-auto"> 
        <form action="{{ route('dashboard.posts.update') }}" method="POST">
            @csrf
            <table class="w-full">
                <tr class="border-black border-b-2">
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Zdjęcie</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tytuł</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Autor</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data Stworzenia</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Data modyfikacji</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aktywny</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edytuj Post</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Zmień widoczność</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider text-red-500">Usuń post</th>
                </tr>
                @foreach($posts as $post)
                    <tr class="border-b-2 @if($post->active == False) bg-gray-200 @endif">
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if(!empty($post->image))
                                <img class="inset-0 h-full w-full object-cover object-center" src="{{ asset('storage/'.$post->image) }}" />
                            @else
                                <p>Brak</p>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $post->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <a href="{{ route('post.show', ['post' => $post->slug]) }}" class="no-underline hover:underline">{{ substr($post->title, 0, 24)."..." }}</a>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @foreach($users as $user)
                                @if($user->id == $post->user_id)
                                    {{ $user->name }}
                                @endif
                            @endforeach
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $post->created_at }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $post->updated_at }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($post->active == True)
                                Tak
                            @else
                                Nie
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="radio" name="action" value="edit-{{ $post->id }}"/>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="radio" name="action" value="hide-{{ $post->id }}"/>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <input type="radio" name="action" value="delete-{{ $post->id }}"/>
                        </td>
                    </tr>
                @endforeach
            </table>
            <button type="submit" class="p-2 m-2 rounded-full float-right bg-gray-200 hover:bg-gray-400">
                Wyślij
            </button>
        </form>
    </div>
@endsection