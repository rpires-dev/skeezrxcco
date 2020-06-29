<style>
    .masonry .entry__meta {
        font-family: "IBM Plex Sans", sans-serif;
        font-weight: 400;
        font-size: 11.5px;
        line-height: 2rem;
        text-transform: uppercase;
        letter-spacing: 1.2px;
        margin-bottom: -1.8rem;
    }

    hr {
        border: solid #151515;
        border-width: 1px 0 0;
        clear: both;
        margin: 1.4rem 0 1.6rem;
        height: 0;
    }

    @media screen and (max-width: 1500px) {
        .masonry-wrap {
            max-width: 1019px;
        }
    }

    #masonry_entry:hover #entry__title {

        text-decoration: underline;
    }

    #entry__title:hover~#entryImage {

        opacity: 0.9;

        -webkit-transition: opacity 0.3s ease-in-out;
    }
</style>
<article class="masonry__brick entry format-standard animate-this" style="position: absolute; left: 50%; top: 0px;"
    id="masonry_entry">
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
            <img src="/storage/{{ $post->image }}" id="entryImage" alt="">
        </a>
        @endswitch

    </div>
    <div class="entry__text">
        <div class="entry__header">
            <h2 class="entry__title" id="entry__title"><a href="/post/{{$post->slug}}">
                    {{ substr($post->title,0, 70) }}</a>
            </h2>
            <div class="entry__meta">
                <span class="entry__meta-cat">

                    {{-- @foreach($post->tags as $tag)

                    <a href="#">{{$tag->name}}</a>
                    @endforeach --}}

                    <a href="/category/{{$post->category->slug}}">({{$post->category->name}})</a>

                </span>
                <span class="entry__meta-date">
                    <a href="#">{{ Date::parse($post->created_at)->format('d F, Y') }}</a>
                </span>
            </div>
        </div>
        {{-- <div class="entry__excerpt">
            <p>
                {{ substr($post->excerpt,0, 40) }}
        </p>
    </div> --}}
    </div>
    <hr>

</article>
