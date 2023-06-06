@extends('layouts.app')

@section('content')
    <div class="container w-full md:max-w-6xl mx-auto pt-20">
        <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">
            @livewire('posts-grid')
{{--            <x-blog-components.posts-grid :posts="$posts"/>--}}
        </div>
    </div>
@endsection


