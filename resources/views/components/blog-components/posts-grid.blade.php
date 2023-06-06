@props(['posts'])
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
        {{$posts->withQueryString()->links()}}
    @endif
@else
    <p class="text-center dark:text-gray-400">No posts yet! Check back later...</p>
@endif
