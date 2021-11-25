@extends('dashboard')

@section('dashboard_content')
    <div class="container m-auto">
        <div class="text-center">
            <form action="{{ route('add_post') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                                <input type="text" id="post_title" name="post_title" value="{{ old('post_title') }}" maxlength="255" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"/>
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
                                <textarea id="post_content" name="post_content" rows="16" value="{{ old('post_content') }}" class="shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md"></textarea>
                            </div>
                        </div>
                        <div>
                            <label for="about" class="block text-sm font-medium text-gray-700">
                                Tagi
                                @foreach ($errors->get('post_tags') as $message)
                                    <span class="text-red-600">{{ $message }}</span>
                                @endforeach
                            </label>
                            <div class="mt-1">
                                <div class="grid grid-cols-2">
                                    <div class="text-center">
                                        <p class="p-2">Dodaj nowe (bez spacji):</p>
                                        <input type="text" name="post_new_tag[]" pattern="[A-Za-z0-9_-]+" placeholder="Tag 1" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline m-2"/>
                                        <input type="text" name="post_new_tag[]" pattern="[A-Za-z0-9_-]+" placeholder="Tag 2" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline m-2"/>
                                        <input type="text" name="post_new_tag[]" pattern="[A-Za-z0-9_-]+" placeholder="Tag 3" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline m-2"/>
                                        <input type="text" name="post_new_tag[]" pattern="[A-Za-z0-9_-]+" placeholder="Tag 4" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline m-2"/>
                                    </div>
                                    <div class="text-center">
                                        <p class="p-2">Wcześniej używane:</p>
                                        @foreach($tags as $tag)
                                            <span class="p-2">
                                                <label for="{{ $tag->name }}">{{ $tag->name }}</label>
                                                <input type="checkbox" name="post_tag[]" value="{{ $tag->id }}" id="{{ $tag->name }}"/>
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">
                                Zdjęcie
                                @foreach ($errors->get('post_image') as $message)
                                    <span class="text-red-600">{{ $message }}</span>
                                @endforeach
                            </label>
                            <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md">
                                <div class="space-y-1 text-center">              
                                    <label class="w-64 flex flex-col items-center px-4 py-6 bg-white rounded-md shadow-md tracking-wide uppercase border border-blue cursor-pointer hover:bg-purple-600 hover:text-white text-purple-600 ease-linear transition-all duration-150">
                                        <i class="fas fa-cloud-upload-alt fa-3x"></i>
                                        <span class="mt-2 text-base leading-normal">Wybierz zdjęcie</span>
                                        <input type="file" name="post_image" class="hidden"/>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            Wstaw post
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection