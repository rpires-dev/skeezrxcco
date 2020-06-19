@extends('layouts.index')
@section('page_title', '| Blog ')
@section('container')
<style>
    .s-content {
        padding-top: 0;
    }
</style>
<div class="s-content" style="
background-color: white;
padding-top:0px;">
    <div class="media-wrap entry__media">
        <div class="entry__slider slider">
            <div class="slider__slides">
                <div class="slider__slide">
                    <img src="/images/thumbs/single/gallery/single-gallery-01-1000.jpg" srcset="/images/thumbs/single/gallery/single-gallery-01-2000.jpg 2000w,
                                    /images/thumbs/single/gallery/single-gallery-01-1000.jpg 1000w,
                                    /images/thumbs/single/gallery/single-gallery-01-500.jpg 500w"
                        sizes="(max-width: 2000px) 100vw, 2000px" alt="" style="
    height: 900px;
">

                </div>

            </div>
        </div>
    </div>
    <div class="masonry-wrap">

        <div class="masonry">

            <div class="grid-sizer"></div>

            @foreach ($posts as $post)
            @include('partials.post',['post' => $post])
            @endforeach



        </div> <!-- end masonry -->

    </div> <!-- end masonry-wrap -->

    <div class="row">
        <div class="column large-full">
            <nav class="pgn">
                <ul>
                    <li><a class="pgn__prev" href="#0">Prev</a></li>
                    <li><a class="pgn__num" href="#0">1</a></li>
                    <li><span class="pgn__num current">2</span></li>
                    <li><a class="pgn__num" href="#0">3</a></li>
                    <li><a class="pgn__num" href="#0">4</a></li>
                    <li><a class="pgn__num" href="#0">5</a></li>
                    <li><span class="pgn__num dots">…</span></li>
                    <li><a class="pgn__num" href="#0">8</a></li>
                    <li><a class="pgn__next" href="#0">Next</a></li>
                </ul>
            </nav>
        </div>
    </div>

</div>
< @stop
