@extends('dashboard')

@section('dashboard_content')
    <div class="container m-auto"> 
        <form action="{{ route('dashboard/posts/edit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input class="hidden" name="post_id" value="{{ $post->id }}"/>
            <div class="shadow sm:rounded-md sm:overflow-hidden">
                <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                    <div>
                        <label for="about" class="block text-sm font-medium text-gray-700">
                            Tytuł posta
                            @foreach ($errors->get('post_title') as $message)
                                <span class="text-red-600">{{ $message }}</span>
                            @endforeach
                        </label>
                        <div class="mt-1">
                            <input type="text" id="post_title" name="post_title" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="{{ $post->title }}"/>
                        </div>
                    </div>
                    <div>
                        <label for="about" class="block text-sm font-medium text-gray-700">
                            Treść posta
                            @foreach ($errors->get('post_content') as $message)
                                <span class="text-red-600">{{ $message }}</span>
                            @endforeach
                        </label>
                        <div class="mt-1">
                            <textarea id="post_content" name="post_content" rows="16" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md">{{ $post->description }}</textarea>
                        </div>
                    </div>
                    <div class="flex flex-row">
                        <div class="w-1/2 text-center">
                            <label class="block text-sm font-medium text-gray-700">
                                Nowe zdjęcie
                                @foreach ($errors->get('post_image') as $message)
                                    <span class="text-red-600">{{ $message }}</span>
                                @endforeach
                            </label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 rounded-md">
                                <div class="space-y-1 text-center">              
                                    <label class="w-64 flex flex-col items-center px-4 py-6 bg-white rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-purple-600 hover:text-white text-purple-600 ease-linear transition-all duration-150">
                                        <span class="mt-2 text-base leading-normal">Wybierz zdjęcie</span>
                                        <input type="file" name="post_image" class="hidden"/>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="w-1/2 text-center">
                            <label class="block text-sm font-medium text-gray-700">
                                Stare zdjęcie
                                @foreach ($errors->get('post_image') as $message)
                                    <span class="text-red-600">{{ $message }}</span>
                                @endforeach
                            </label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 rounded-md"> 
                                @if(!empty($post->image))
                                    <img src="{{ asset('storage/'.$post->image) }}"/>
                                @else
                                    <p>Brak zdjęcia</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Edytuj post
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection