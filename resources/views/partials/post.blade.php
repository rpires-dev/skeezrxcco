<style>
    .masonry_entry:hover #entry__title {

        text-decoration: underline;
    }
</style>

<article class="masonry__brick entry format-standard animate-this" id="masonry_entry">
    <div class="entry__thumb">


        @switch($post->category->name)
        @case('video')
        <iframe src="{{$post->link}}" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen
            allowfullscreen></iframe>
        @break

        @case('audio')
        <iframe src="{{$post->link}}" width="500" height="281" frameborder="0" webkitallowfullscreen mozallowfullscreen
            allowfullscreen></iframe>
        @break

        @default
        <a href="/post/{{$post->slug}}" class="entry__thumb-link">
            <img src="/storage/{{ $post->image }}" alt="">
        </a>
        @endswitch
    </div>
    <div class="entry__text">
        <div class="entry__header">
            <h2 class="entry__title" id="entry__title"><a href="/post/{{$post->slug}}">{{$post->title}}</a>
            </h2>
            <div class="entry__meta">
                <span class="entry__meta-cat">

                    {{-- @foreach($post->tags as $tag)

                    <a href="#">{{$tag->name}}</a>
                    @endforeach --}}

                    <a href="/category/{{$post->category->slug}}">{{$post->category->name}}</a>

                </span>
                <span class="entry__meta-date">
                    <a href="#">{{ Date::parse($post->created_at)->format('d F, Y') }}</a>
                </span>
            </div>
        </div>
        <div class="entry__excerpt">
            <p>
                {{ substr($post->excerpt,0, 40) }}
            </p>
        </div>
    </div>

</article>
