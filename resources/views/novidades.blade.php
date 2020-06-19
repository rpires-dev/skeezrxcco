@extends('layouts.index')
@section('page_title', '| Blog ')
@section('container')
<style>
    hr {
        border: solid #151515;
        border-width: 1px 0 0;
        clear: both;
        margin: 0;
        height: 0;
    }

    .entry__related {
        margin-top: 1rem;
        padding-top: 2rem;
        border-top: 0 solid rgba(0, 0, 0, 0.1);
        position: relative;
    }
</style>

<div class="s-content" style="
background-color: white;
padding-top:0px;">


    <div class="row" style="margin-bottom: 2em;">

        <div class="column large-6 tab-full">


            <aside class="pull-quote">
                <img src="images/thumbs/masonry/rucksack-600.jpg" alt=""> </aside>
        </div>
        <div class="column large-6 tab-full">



            <blockquote cite="http://where-i-got-my-info-from.com">
                <a href="">
                    <strong style="font-size: 25px;color:black;">
                        Leman connect consagra-se como a agencia de marketing da decada em portugal.
                    </strong>
                </a>
                <cite>
                    <a href="#0">Marketing</a>
                </cite>
            </blockquote>



        </div>

    </div>
    <hr style="margin-bottom: 2em;">

    <div class="masonry-wrap">

        <div class="masonry">

            <div class="grid-sizer"></div>

            @foreach ($posts as $post)
            {{-- @include('partials.post',['post' => $post]) --}}

            <article class="masonry__brick entry format-standard animate-this">
                <div class="entry__thumb">






                    @switch($post->category->name)
                    @case('video')
                    <iframe src="{{$post->link}}" width="500" height="281" frameborder="0" webkitallowfullscreen
                        mozallowfullscreen allowfullscreen></iframe>
                    @break

                    @case('audio')
                    <iframe src="{{$post->link}}" width="500" height="281" frameborder="0" webkitallowfullscreen
                        mozallowfullscreen allowfullscreen></iframe>
                    @break

                    @default
                    <a href="/post/{{$post->slug}}" class="entry__thumb-link">
                        <img src="/storage/{{ $post->image }}" alt="">
                    </a>
                    @endswitch


                </div>
                <div class="entry__text" style="
                padding-bottom: 1px;
            ">
                    <div class="entry__header">
                        <h2 class="entry__title"><a href="/post/{{$post->slug}}">{{$post->title}}</a>
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
                    {{-- <div class="entry__excerpt">
                        <p>
                            {{ substr($post->excerpt,0, 40) }}
                    </p>
                </div> --}}
        </div>
        <hr>

        </article>

        @endforeach






    </div> <!-- end masonry -->

    <div class="row">
        <div class="entry__related">
            <ul class="related">
                <li class="related__item">
                    <a href="single-standard.html" class="related__link">
                        <img src="images/thumbs/masonry/walk-600.jpg" alt="" style="
    height: 147px;
    width: 300px;
    object-fit: cover;
">
                    </a>
                    <h5 class="related__post-title">Using Repetition and Patterns in Photography.</h5>
                    <hr>
                </li>
                <li class="related__item">
                    <a href="single-standard.html" class="related__link">
                        <img src="images/thumbs/masonry/dew-600.jpg" alt="" style="
    height: 147px;
    width: 300px;
    object-fit: cover;
">
                    </a>
                    <h5 class="related__post-title">Health Benefits Of Morning Dew.</h5>
                    <hr>
                </li>
                <li class="related__item">
                    <a href="single-standard.html" class="related__link">
                        <img src="images/thumbs/masonry/rucksack-600.jpg" alt="" style="
    height: 147px;
    width: 300px;
    object-fit: cover;
">
                    </a>
                    <h5 class="related__post-title">The Art Of Visual Storytelling.</h5>
                    <hr>
                </li>
                <li class="related__item">
                    <a href="single-standard.html" class="related__link">
                        <img src="images/thumbs/masonry/walk-600.jpg" alt="" style="
    height: 147px;
    width: 300px;
    object-fit: cover;
">
                    </a>
                    <h5 class="related__post-title">Using Repetition and Patterns in Photography.</h5>
                    <hr>
                </li>
                <li class="related__item">
                    <a href="single-standard.html" class="related__link">
                        <img src="images/thumbs/masonry/dew-600.jpg" alt="" style="
    height: 147px;
    width: 300px;
    object-fit: cover;
">
                    </a>
                    <h5 class="related__post-title">Health Benefits Of Morning Dew.</h5>
                    <hr>
                </li>
                <li class="related__item">
                    <a href="single-standard.html" class="related__link">
                        <img src="images/thumbs/masonry/rucksack-600.jpg" alt="" style="
    height: 147px;
    width: 300px;
    object-fit: cover;
">
                    </a>
                    <h5 class="related__post-title">The Art Of Visual Storytelling.</h5>
                    <hr>
                </li>
            </ul>
        </div>
    </div>

</div>

</div>
@stop
