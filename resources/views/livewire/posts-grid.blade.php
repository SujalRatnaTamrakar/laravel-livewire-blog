<div>

    <form>
        <label for="search"
               class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none"
                     stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>
            <input type="search" id="search" wire:model.lazy="search"
                   class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                   placeholder="Search ..." required>
            <button type="submit" wire:click.prevent="render"
                    class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Search
            </button>
        </div>
        <div class="container mx-auto p-4">
            <button id="filterButton" type="button"
                    class=" bg-gray-800 hover:bg-blue-600 text-white text-sm font-bold py-1 px-2 rounded mb-4"><i
                    class="fa fa-filter"></i> Filter
            </button>

            <div id="dropdownContainer" class="hidden">
                <div class="flex flex-wrap">
                    <div class="flex items-center justify-center p-4">
                        <button id="authorFilter" data-dropdown-toggle="author-dropdown"
                                class="text-black bg-white hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:text-gray-200 dark:bg-slate-500 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                type="button">
                            Filter by author
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="author-dropdown"
                             class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                                Author
                            </h6>
                            <ul class="space-y-2 text-sm h-80 overflow-y-scroll" aria-labelledby="authorFilter">
                                @foreach($authors as $id=>$author)
                                    <li class="flex items-center">
                                        <label
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">

                                            <input wire:model.defer="author" type="checkbox"
                                                   value="{{ $id }}"
                                                   class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"/>

                                            {{ $author }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="flex items-center justify-center p-4">
                        <button id="categoryFilter" data-dropdown-toggle="category-dropdown"
                                class="text-black bg-white hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:text-gray-200 dark:bg-slate-500 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                type="button">
                            Filter by category
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="category-dropdown"
                             class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                                Category
                            </h6>
                            <ul class="space-y-2 text-sm h-80 overflow-y-scroll" aria-labelledby="categoryFilter">
                                @foreach($categories as $id=>$category)
                                    <li class="flex items-center">
                                        <label
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">

                                            <input wire:model.defer="category" type="checkbox"
                                                   value="{{ $id }}"
                                                   class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"/>

                                            {{ $category }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="flex items-center justify-center p-4">
                        <button id="tagFilter" data-dropdown-toggle="tag-dropdown"
                                class="text-black bg-white hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:text-gray-200 dark:bg-slate-500 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                type="button">
                            Filter by tag
                            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" stroke="currentColor"
                                 viewBox="0 0 24 24"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>

                        <!-- Dropdown menu -->
                        <div id="tag-dropdown" class="z-10 hidden w-56 p-3 bg-white rounded-lg shadow dark:bg-gray-700">
                            <h6 class="mb-3 text-sm font-medium text-gray-900 dark:text-white">
                                Tag
                            </h6>
                            <ul class="space-y-2 text-sm h-80 overflow-y-scroll" aria-labelledby="tagFilter">
                                @foreach($tags as $id=>$tag)
                                    <li class="flex items-center">
                                        <label
                                            class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-100">

                                            <input wire:model.defer="tag" type="checkbox"
                                                   value="{{ $id }}"
                                                   class="w-4 h-4 bg-gray-100 border-gray-300 rounded text-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 dark:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500"/>

                                            {{ $tag }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="flex items-center justify-center p-4">
                        <button
                            wire:click.prevent="render"
                                class="text-black bg-white hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:text-gray-200 dark:bg-blue-500 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                                type="button">
                            Filter
                        </button>
                    </div>

                    <div class="flex items-center justify-center p-4">
                        <button
                            wire:click.prevent="clearFilters"
                            class="text-black bg-white hover:bg-primary-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center dark:text-gray-200 dark:bg-blue-500 dark:hover:bg-primary-700 dark:focus:ring-primary-800"
                            type="button">
                            <i class="fa fa-times"></i> Clear all
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @if($posts->count())
        <x-blog-components.featured-card-layout :post="$posts[0]"/>
        @if($posts->count()>1)
            <div class="lg:grid lg:grid-cols-6">
                @foreach($posts->skip(1) as $post)
                    <x-blog-components.card-layout :post="$post" :test="$loop->iteration"
                                                   class="{{$loop->iteration < 3? 'col-span-3' : 'col-span-2'}}"/>
                @endforeach
            </div>
            <hr class="border-b-2 border-gray-400 mb-8">
            {{$posts->links()}}
        @endif
    @else
        <p class="text-center dark:text-gray-400">No posts yet! Check back later...</p>
    @endif
</div>

@push('scripts')
    <script>
        document.addEventListener("livewire:load", function () {
            Livewire.on('gotoTop', function () {
                window.scrollTo(0, 0);
            });

            const filterButton = document.getElementById('filterButton');
            const dropdownContainer = document.getElementById('dropdownContainer');

            filterButton.addEventListener('click', () => {
                dropdownContainer.classList.toggle('hidden');
            });
        });

    </script>
@endpush
