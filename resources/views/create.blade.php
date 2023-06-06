@extends('layouts.app')
@section('content')
    <div class="container w-full md:max-w-6xl mx-auto pt-20">
        <!-- Page Heading -->
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Create a new post') }}
                </h2>
            </div>
        </header>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white dark:bg-gray-700 border-b border-gray-200">
                        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-4">
                                <x-input-label for="title" :value="__('Title')"/>
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title"
                                              :value="old('title')"
                                              required/>
                                <x-input-error :messages="$errors->get('title')" class="mt-2"/>
                            </div>

                            <div class="mb-4">
                                <x-input-label for="excerpt" :value="__('Excerpt')"/>
                                <x-text-input id="excerpt" class="block mt-1 w-full" type="text" name="excerpt"
                                              :value="old('excerpt')"
                                              required/>
                                <x-input-error :messages="$errors->get('excerpt')" class="mt-2"/>
                            </div>

                            <div class="grid grid-cols-6 mb-4">
                                <div class="col-span-6 sm:col-span-6 lg:col-span-1">
                                    <x-input-label for="category" :value="__('Category')"/>
                                    <select
                                        class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm"
                                        name="category_id" id="category" required>
                                        <option value="">Select Category</option>
                                        @php
                                            $categories = \App\Models\Category::all();
                                        @endphp

                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{ucwords($category->name)}}</option>
                                        @endforeach
                                    </select>
                                    <x-input-error :messages="$errors->get('category')" class="mt-2"/>
                                </div>

                                <div class="col-span-6 sm:col-span-6 lg:col-span-5">
                                    <x-input-label for="thumbnail" :value="__('Thumbnail')"/>
                                    <input type="file"
                                           class="border-2 p-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md w-full"
                                           name="thumbnail" id="thumbnail">
                                    <x-input-error :messages="$errors->get('thumbnail')" class="mt-2"/>
                                </div>
                            </div>

                            <div class="mb-4">
                                <x-input-label for="tags" :value="__('Tags')"/>
                                <input class="border-2 p-1 border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md w-full" type="text" id="tagInputField" name="tags" value="{{ old('tags') }}">
                                <x-input-error :messages="$errors->get('tags')" class="mt-2"/>
                            </div>

                            <div class="mb-8">

                                <x-input-label for="content" :value="__('Content')"/>

                                <textarea class="ckeditor form-control" id="content" name="content">{{ old('content') }}</textarea>
                                <x-input-error :messages="$errors->get('content')" class="mt-2"/>

                            </div>

                            <div class="flex p-1">
                                <button type="submit"
                                        class="group rounded-2xl h-12 w-48 bg-green-500 dark:bg-gray-900 font-bold text-lg text-white relative overflow-hidden">
                                    Create Post
                                    <div
                                        class="absolute duration-300 inset-0 w-full h-full transition-all scale-0 group-hover:scale-100 group-hover:bg-white/30 rounded-2xl">
                                    </div>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function () {
            let  tagInput = document.getElementById('tagInputField');
            let tagify = new Tagify(tagInput);
        });
    </script>
@endpush
