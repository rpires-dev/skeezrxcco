@extends('layouts.index')
@section('page_title', '| Blog ')
@section('container')

<style>
    .bottom-left {
        position: absolute;
        bottom: 8px;
        left: 16px;
    }
</style>

<div class="s-content" style="
background-color: white;
">
    <div class="media-wrap entry__media">
        <div class="entry__slider slider">
            <div class="slider__slides">
                <div class="slider__slide">
                    <img src="https://www.lesitedelasneaker.com/wp-content/images/2018/12/air-jordan-4-retro-white-black-bright-crimson-pale-citron-308497-116-1-1100x772.jpg"
                        alt="">
                    <div class="bottom-left">

                        <h2 style="background-color: white;padding:10px;">Novos Air Jordan X Last dance</h2>

                    </div>
                </div>

            </div>
        </div>
        <hr>
    </div>
    <div class="masonry-wrap">

        <div class="masonry">

            <div class="grid-sizer"></div>

            @foreach ($posts as $post)
            @include('partials.post',['post' => $post])

            @endforeach



        </div> <!-- end masonry -->

    </div> <!-- end masonry-wrap -->

    {{-- <div class="row">
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
    </div> --}}

</div>
@stop
