@extends('layouts.index')
@section('page_title', '| Blog ')
@section('container')

<div class="s-content" style="
background-color: white;
padding-top:0px;">

    <article class="column large-full entry format-standard">

        <div class="media-wrap entry__media">
            <div class="entry__post-thumb">
                <img src="images/thumbs/single/standard/standard-1000.jpg" srcset="images/thumbs/single/standard/standard-2000.jpg 2000w,
                             images/thumbs/single/standard/standard-1000.jpg 1000w,
                             images/thumbs/single/standard/standard-500.jpg 500w"
                    sizes="(max-width: 2000px) 100vw, 2000px" alt="">
            </div>
        </div>

        <div class="content__page-header entry__header">
            <h1 class="display-1 entry__title">
                This Is A Standard Format Post.
            </h1>
            <ul class="entry__header-meta">
                <li class="author">By <a href="#0">Jonathan Doe</a></li>
                <li class="date">April 30, 2019</li>
                <li class="cat-links">
                    <a href="#0">Marketing</a><a href="#0">Management</a>
                </li>
            </ul>
        </div>
    </article>

    <hr>
    <br>
    <div class="masonry-wrap">

        <div class="masonry">

            <div class="grid-sizer"></div>

            @foreach ($posts as $post)
            @include('partials.post_no_desc',['post' => $post])
            @endforeach



        </div> <!-- end masonry -->

    </div> <!-- end masonry-wrap -->


</div>
@stop
