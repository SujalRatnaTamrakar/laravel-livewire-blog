@props(['post'])

<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg m-5">
    <div class="dark:bg-gray-800 dark:text-gray-50">
        <div class="container grid grid-cols-12 mx-auto dark:bg-gray-900">
            <div class="bg-no-repeat bg-cover dark:bg-gray-700 col-span-full lg:col-span-4"
                 style="background-image: url('{{ \Illuminate\Support\Facades\Storage::url($post->thumbnail) }}'); background-position: center center; background-blend-mode: multiply; background-size: cover;"></div>
            <div class="flex flex-col p-6 col-span-full row-span-full lg:col-span-8 lg:p-10 dark:bg-slate-800">
                <div class="flex justify-start">
                    <span
                        class="px-2 py-1 text-xs rounded-full dark:bg-violet-400 dark:text-gray-900">{{ $post->category->name }}</span>
                </div>
                <h1 class="text-3xl font-semibold">{{ $post->title }}</h1>
                <p class="flex-1 pt-2">{{ $post->excerpt }}</p>
                <a rel="noopener noreferrer" href="#"
                   class="inline-flex items-center pt-2 pb-6 space-x-2 text-sm dark:text-violet-400">
                    <span>Read more</span>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                        <path fill-rule="evenodd"
                              d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                </a>
                <div class="flex items-center justify-between pt-2">
                    <div class="flex space-x-2">
                        @foreach($post->tags as $tag)
                            <x-blog-components.tag-chip :name="$tag->name"></x-blog-components.tag-chip>
                        @endforeach
                    </div>
                </div>
                <div class="mt-5 flex">
                    <a href="{{ route('post.edit',$post->id) }}">
                        <button
                            class="bg-teal-800 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button"
                        ><span><i class="fa fa-edit"></i> Edit</span>
                        </button>
                    </a>
                    <form method="POST" action="{{ route('post.destroy',$post->id) }}">
                        @csrf
                        @method('DELETE')
                        <button
                            class="bg-red-800 text-white active:bg-pink-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="submit"
                        ><span><i class="fa fa-trash"></i> Delete</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
