@extends('layouts.app')

@section('content')
    <!--Container-->
    <div class="container w-full md:max-w-6xl mx-auto pt-20">

        <div class="w-full px-4 md:px-6 text-xl text-gray-800 leading-normal" style="font-family:Georgia,serif;">

            <!--Title-->
            <div class="font-sans">
                <p class="text-base md:text-sm text-green-500 font-bold">&lt; <a href="/"
                                                                                 class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">BACK
                        TO HOME</a>
                </p>
                <h1 class="font-bold font-sans break-normal text-gray-900 pt-6 pb-2 text-3xl md:text-4xl dark:text-gray-400">{{$post->title}}</h1>
                <p class="text-sm md:text-base font-normal text-gray-600 dark:text-gray-400">Published
                    at {{$post->created_at->diffForHumans()}}</p>
                <p class="text-sm md:text-base font-normal text-gray-600 dark:text-gray-400">By <a
                        href="/authors/{{$post->author->username}}"
                        class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">{{$post->author->name}}</a>
                    in <a href="/categories/{{$post->category->slug}}"
                          class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">{{$post->category->name}}</a>
                </p>
            </div>


            <!--Post Content-->

            <div class="w-full mt-10 bg-gray-300 flex flex-wrap justify-center">
                @if($post->thumbnail=="null")
                    <img src="https://picsum.photos/id/{{$post->id}}/760/500" alt="Blog Post illustration"
                         class="rounded-xl">
                @else
                    <img src="{{ \Illuminate\Support\Facades\Storage::url($post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl">
                @endif
            </div>


            <!--Lead Para-->
            <div class="py-6 text-justify dark:text-gray-400">
                {!! $post->content !!}
            </div>

            <p class="py-6 dark:text-gray-400">The basic blog page layout is available and all using the default Tailwind CSS classes
                (although
                there are a few hardcoded style tags). If you are going to use this in your project, you will want to
                convert the classes into components.</p>


            <h1 class="py-2 font-sans dark:text-gray-400">Heading 1</h1>
            <h2 class="py-2 font-sans dark:text-gray-400">Heading 2</h2>
            <h3 class="py-2 font-sans dark:text-gray-400">Heading 3</h3>
            <h4 class="py-2 font-sans dark:text-gray-400">Heading 4</h4>
            <h5 class="py-2 font-sans dark:text-gray-400">Heading 5</h5>
            <h6 class="py-2 font-sans dark:text-gray-400">Heading 6</h6>

            <p class="py-6 dark:text-gray-400">Sed dignissim lectus ut tincidunt vulputate. Fusce tincidunt lacus purus, in mattis tortor
                sollicitudin pretium. Phasellus at diam posuere, scelerisque nisl sit amet, tincidunt urna. Cras nisi
                diam,
                pulvinar ut molestie eget, eleifend ac magna. Sed at lorem condimentum, dignissim lorem eu, blandit
                massa.
                Phasellus eleifend turpis vel erat bibendum scelerisque. Maecenas id risus dictum, rhoncus odio vitae,
                maximus purus. Etiam efficitur dolor in dolor molestie ornare. Aenean pulvinar diam nec neque tincidunt,
                vitae molestie quam fermentum. Donec ac pretium diam. Suspendisse sed odio risus. Nunc nec luctus nisi.
                Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Duis nec
                nulla
                eget sem dictum elementum.</p>

            <ol class="dark:text-gray-400">
                <li class="py-3">Maecenas accumsan lacus sit amet elementum porta. Aliquam eu libero lectus. Fusce
                    vehicula
                    dictum mi. In non dolor at sem ullamcorper venenatis ut sed dui. Ut ut est quam. Suspendisse quam
                    quam,
                    commodo sit amet placerat in, interdum a ipsum. Morbi sit amet tellus scelerisque tortor semper
                    posuere.
                </li>
                <li class="py-3">Morbi varius posuere blandit. Praesent gravida bibendum neque eget commodo. Duis auctor
                    ornare mauris, eu accumsan odio viverra in. Proin sagittis maximus pharetra. Nullam lorem mauris,
                    faucibus ut odio tempus, ultrices aliquet ex. Nam id quam eget ipsum luctus hendrerit. Ut eros
                    magna,
                    eleifend ac ornare vulputate, pretium nec felis.
                </li>
                <li class="py-3">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae;
                    Nunc vitae pretium elit. Cras leo mauris, tristique in risus ac, tristique rutrum velit. Mauris
                    accumsan
                    tempor felis vitae gravida. Cras egestas convallis malesuada. Etiam ac ante id tortor vulputate
                    pretium.
                    Maecenas vel sapien suscipit, elementum odio et, consequat tellus.
                </li>
            </ol>

            <blockquote class="border-l-4 border-green-500 italic my-8 pl-8 md:pl-12 dark:text-gray-400">Example of blockquote - Lorem
                ipsum
                dolor sit amet, consectetur adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet
                ligula.
            </blockquote>

            <!--/ Post Content-->

        </div>

        <!--Tags -->
            <div class="text-base md:text-sm text-gray-500 px-4 py-6 dark:text-gray-400">
                Tags:
                @foreach($post->tags  as $tag)
                    <a href="#" class="text-base md:text-sm text-green-500 no-underline hover:underline">{{ $tag->name }}</a> .
                @endforeach
            </div>

        <!--Author-->
        <div class="flex w-full items-center font-sans px-4 py-12">
            <img class="w-10 h-10 rounded-full mr-4" src="https://i.pravatar.cc/300/u={{$post->user_id}}"
                 alt="Avatar of Author">
            <div class="flex-1 px-2">
                <p class="text-base font-bold text-base md:text-xl leading-none mb-2"><a
                        href="/authors/{{$post->author->username}}"
                        class="text-base md:text-sm text-green-500 font-bold no-underline hover:underline">{{$post->author->name}}</a>
                </p>
            </div>
        </div>
        <!--/Author-->

    <!--Divider-->
        <hr class="border-b-2 border-gray-400 mb-8 mx-4">

        <!--Subscribe-->
        <div class="container px-4">
            <div class="font-sans bg-gradient-to-b from-green-100 to-gray-100 rounded-lg shadow-xl p-4 text-center dark:bg-gradient-to-b dark:from-green-300 dark:to-dark-blue-800">
                <h2 class="font-bold break-normal text-xl md:text-3xl">Subscribe to our Newsletter</h2>
                <h3 class="font-bold break-normal text-gray-600 text-sm md:text-base">Get the latest posts delivered
                    right
                    to your inbox</h3>
                <div class="w-full text-center pt-4">
                    <form method="POST" action="/subscribe">
                        @csrf
                        <div class="max-w-xl mx-auto p-1 pr-0 flex flex-wrap items-center">
                            <input type="email" placeholder="youremail@example.com" name="email" required
                                   class="flex-1 mt-4 appearance-none border border-gray-400 rounded shadow-md p-3 text-gray-600 mr-2 focus:outline-none">
                            <button type="submit"
                                    class="flex-1 mt-4 block md:inline-block appearance-none bg-green-500 text-white text-base font-semibold tracking-wider uppercase py-4 rounded shadow hover:bg-green-400">
                                Subscribe
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /Subscribe-->

    </div>
    <!--/container-->
@endsection


