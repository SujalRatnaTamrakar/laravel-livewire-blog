@props(['post'])
<article
    class="transition-colors duration-300 hover:bg-gray-200 dark:hover:bg-gray-700 border border-gray-800/20 dark:border-gray-700 m-3 border-opacity-1 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="lg:flex-1 lg:mr-8 md:flex md:flex-wrap md:justify-around">
            @if($post->thumbnail=="null")
                <img src="https://picsum.photos/id/{{$post->id}}/500" alt="Blog Post illustration" class="rounded-xl">
            @else
                <img src="{{asset('storage/'.$post->thumbnail)}}" alt="Blog Post illustration" class="rounded-xl">
            @endif
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <a href="/categories/{{$post->category->slug}}"
                       class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{$post->category->name}}</a>

                </div>

                <div class="mt-4">
                    <h1 class="text-3xl dark:text-gray-400">
                        <a href="/posts/{{$post->slug}}">
                        {{$post->title}}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time>{{$post->created_at->diffForHumans()}}</time>
                                    </span>
                </div>
            </header>

            <div class="text-sm mt-2 dark:text-gray-400">
                <p>
                    {{$post->excerpt}}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img class="w-10 h-10 rounded-full mr-4" src="https://i.pravatar.cc/300/u={{$post->user_id}}" alt="Avatar of Author">
                    <div class="ml-3 dark:text-gray-400">
                        <a href="/authors/{{$post->author->username}}">
                            <h5 class="font-bold">{{$post->author->name}}</h5></a>
                    </div>
                </div>

                <div class="lg:block">
                    <a href="/posts/{{$post->slug}}"
                       class="bg-transparent border border-gray-500 hover:border-green-500 text-xs text-gray-500 hover:text-green-500 font-bold py-2 px-4 rounded-full"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
