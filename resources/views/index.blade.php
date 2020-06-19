@extends('layouts.index')
@section('page_title', '| Home Page ')
@section('container')
@section('css')
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Sedgwick+Ave+Display&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.rawgit.com/filamentgroup/fixed-sticky/master/fixedsticky.css">
@endsection

<style>
    .masonry .entry__text {
        padding: 1.2rem 0.8rem 4rem;
        background-color: #ffffff;
        padding-left: 0px;
        padding-bottom: 1px;
    }

    .sidebar {
        display: inline-block;

        vertical-align: top;
    }

    /* loaded fixed-sticky polyfill
	https://github.com/filamentgroup/fixed-sticky */
    .fixedsticky {
        top: 0;
    }

    .format-gallery .slick-dots {
        text-align: right;
        margin: 0;
        padding: 0 2rem 0 2.4rem;
        position: relative;
        top: auto;
        bottom: 8.6rem;
        left: 0;
    }

    .responsive {
        width: 100%;
        height: auto;
    }

    th,
    td {

        text-align: left;
        border-bottom: 1px solid #e0e0e000;
    }

    th:first-child,
    td:first-child {
        width: 60%;
        padding-left: 0;
    }

    @media only screen and (max-width: 600px) {
        .sticky_title {
            font-size: 3.5vw;
        }


        .sliderText {
            background-color: white;
            padding-left: .4em;
            margin-top: 2rem;
            margin-bottom: 0;
            font-size: 32px;
            font-weight: bolder;
        }

        .format-gallery .slick-dots {
            text-align: left;
            margin: 0;
            padding: 0 2rem 0 2.4rem;
            position: relative;
            top: auto;
            bottom: 2.4rem;
            left: 0;
        }

        .category_ {
            margin-top: 0.4rem;
            padding-left: 1.5em;

        }

        .title_grid_ {
            font-size: 3.5vw;
            margin-top: 0;
        }

        .image_grid_ {
            width: 44%;
            padding: 0;
        }

        .image_grid_img {
            max-width: 90%;
        }

        .date_grid_ {
            font-size: 2.7vw;
        }



        hr {
            border: solid #151515;
            border-width: 1px 0 0;
            clear: both;
            margin: -3.6rem 0 1.6rem;
            height: 0;
        }

        th:first-child,
        td:first-child {
            width: 50%;
            padding-left: 0;
        }



    }



    @media only screen and (min-width: 600px) {
        .sticky_title {
            font-size: .8vw;
        }

        .related__item {
            float: left;
            width: 33.33333%;
            padding-left: 4rem;
            margin-bottom: 3.2rem;
            height: 265px;
        }

        .image_grid_img {
            max-width: 92%;
        }

        .sliderText {
            margin-top: 22px;
            font-size: 50px;
        }

        th:first-child,
        td:first-child {
            /* width: 50%; */
            padding-left: 11px;
            width: 302px;
        }
    }

    .table-responsive {
        min-height: 10em;
        display: table-cell;
        vertical-align: middle
    }

    @media only screen and (max-width: 600px) {

        th:first-child,
        td:first-child {
            width: 50%;
            padding-left: 11px;
        }
    }
</style>

<style>
    @media only screen and (max-width: 600px &) {

        th:first-child,
        td:first-child {
            width: 50%;
            padding-left: 0;
        }

        .responsive {
            width: 100%;
            height: auto;
        }

        .text-center {
            padding-left: 19%;
            text-align: center;
            padding-right: 19%;

            margin-bottom: 3em;
            margin-top: 0;
            width: 81%;
            font-size: 4vw;
        }
    }


    @media only screen and (min-width: 600px) {


        .text-center {
            padding-left: 19%;
            text-align: center;
            padding-right: 19%;
            color: antiquewhite;
            margin-bottom: 3em;
            width: 81%;
            font-size: 2.5vw;
        }

        .responsive {
            width: 100%;
            height: auto;
        }
    }
</style>
<div class="s-content" style="background-color: white;">

    {{-- Hero Slider --}}
    <article class="column large-full entry format-gallery">

        <div class="media-wrap entry__media">
            <div class="entry__slider slider">
                <div class="slider__slides">
                    @foreach ($gridPosts as $post)
                    <div class="slider__slide">
                        <img src="/storage/{{ $post->image }}" alt="">
                        <div class="bottom-left d-flex">


                            <h2 class="sliderText">
                                {{$post->title}}</h2>

                            <div class="col-3">
                                <table class="table table-light">
                                    <tbody>
                                        <tr>
                                            <td class="category_td" style="padding-right: 0;width: 2%;"> <a
                                                    href="/category/{{$post->category->slug}}"
                                                    style="color: black">({{$post->category->name}})</a>
                                            </td>
                                            <td style="padding-left: 8px;">
                                                {{ Date::parse($post->created_at)->format('d F, Y') }}</a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @endforeach

                </div>
                <hr>
            </div>
        </div>


    </article> <!-- end column large-full entry-->
    {{-- VeryHot News --}}
    <div class="masonry-wrap">
        <div class="masonry">
            <div class="grid-sizer"></div>
            <?php $count = 0; ?>
            @foreach ($slidePosts as $post)
            <?php if($count == 2) break; ?>
            @include('partials.post_no_desc',['post' => $post])
            <?php $count++; ?>
            @endforeach
        </div> <!-- end masonry -->

    </div>
    {{-- latest grid 80% --}}
    <div class="masonry-wrap">

        <div class="column large-full">
            <hr>


            <p style="margin-top: 2px;"> <span> &#x26A1;</span> Ultimas noticas</p>
        </div>
        <?php $count = 0; ?>
        @foreach ($posts as $post)
        <?php if($count == 3) break; ?>
        <div class="column large-full">
            <div class="table-responsive">

                <table style="margin-bottom: 0px;">

                    <tbody>
                        <tr>
                            <td class="image_grid_" rowspan="2" style="padding: 0; ">
                                <img class="image_grid_img" src="/storage/{{ $post->image }}" alt="" style="
                                margin-top: .5em;
                            "></td>
                            <td style="vertical-align: top;padding-left:0px;">
                                <h3 style="margin-top: 0;" class="title_grid_">{{ $post->title }}
                                </h3>
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 0;">
                                <p style="margin-bottom:0px;" class="date_grid_">({{$post->category->name}})
                                    {{ Date::parse($post->created_at)->format('d F, Y') }}</p>
                            </td>
                        </tr>
                    </tbody>
                </table>

                <hr style="margin: 0;">
            </div>

        </div>
        <?php $count++; ?>
        @endforeach

    </div>

    <div class="masonry-wrap">
        <div class="row" style="margin-left: 0;padding-left: 0;">

            <div class="column large-8 tab-full">


                <div class="table">
                    <table class="table table-dark">
                        <tbody>
                            <tr>
                                <td style="padding-left: 0;">
                                    <div class="d-flex flex-column-reverse">
                                        <div><img src="images/wheel-500.jpg" alt="Nature" class="responsive" width="600"
                                                height="400" style="max-width: 616px; ">
                                            <h3 style="margin-top: 0;">Title</h3>
                                            <p style="margin-bottom:0px;">(Music) 12 fev 2020</p>
                                            <hr style="max-width: 616px; ">
                                        </div>


                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>


                </div>
                <?php $count = 0; ?>
                @foreach ($posts as $post)

                <div class="column large-10" style="padding-right: 0px; padding-left: 0px;">
                    <div class="table-responsive">

                        <table style="margin-bottom: 0px;">

                            <tbody>
                                <tr>
                                    <td class="image_grid_" rowspan="2" style="padding: 0; ">
                                        <img class="image_grid_img" src="/storage/posts/post1.jpg" alt="">
                                    </td>
                                    <td style="vertical-align: top;padding-left:0px;padding-top:0px;">
                                        <h3 style="margin-top: 0;" class="title_grid_">Lorem Ipsum Post
                                        </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 0;">
                                        <p style="margin-bottom:0px;" class="date_grid_">(music)
                                            12 junho, 2020</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>

                </div>
                <hr>
                <?php $count++; ?>
                @endforeach
                <a class="btn btn--primary full-width" href="#0">Carregar mais artigos </a>
            </div>

            {{-- StickySideBar --}}

            <div class="column large-4 tab-full">

                <aside class="sidebar fixedsticky">
                    <hr style="margin-top: 0;">
                    <h6 style="margin-top: 0;margin-bottom: 2em;"> &#9899; POPULARES</h6>



                    <table class="table table-dark">
                        <tbody>
                            <tr>
                                <td rowspan="2" style="padding: 0;width: 46%;"> <img src="/storage/posts/post1.jpg"
                                        alt="Nature" class="responsiveSidebar" width="300" height="300"></td>
                                <td style="padding-left: .5em;padding-top:0;">
                                    <p class="sticky_title" style="margin-bottom: 0;font-weight: bold;">
                                        The new adidas </p>
                                </td>

                            </tr>

                            <tr>
                                <td style="padding: .5em;">
                                    <p style="font-size:.8vw;margin:0;">(music) 12 junho, 2020</p>
                                </td>
                            </tr>

                        </tbody>
                    </table>



                </aside>
            </div>

        </div>
    </div>


</div>

<div class="s-content" style="background: url(images/wheel-1000.jpg);background-color:#1a1a1a;">

    <h1 class=" col-8 text-center mb-5"
        style="color: white;background:black;font-family: 'Sedgwick Ave Display', cursive;">Fica a par de tudo o que se
        passa no
        nosso mundo</h1>
    <div class="row half-bottom">
        <div class="column large-6 tab-full">
            <input class="full-width" style="font-size: 2.6rem;background: black;" type="email" placeholder="Email"
                id="sampleInput">
        </div>
        <div class="column large-6 tab-full">
            <a class="btn full-width" href="#0">Subscrever</a>
        </div>
    </div>

</div>
<div class="s-content" style="background-color: white;">
    <div class="masonry-wrap">

        <div class="masonry" style="position: relative; height: 423.418px;">

            <div class="grid-sizer"></div>

        </div> <!-- end masonry -->
        <hr>
        <div class="row">

            <h6 style="margin-top: 0;margin-bottom: 2em;"> &#9899; Musicas</h6>


            <ul class="related">

                <li class="related__item">

                    <a href="single-standard.html" class="related__link">
                        <img src="images/thumbs/masonry/walk-600.jpg" alt=""
                            style="height: 147px;width: 300px;object-fit: cover;">
                    </a>

                    <h5 class="related__post-title" style="margin-top: 1em;">Using Repetition and Patterns in
                        Photography.</h5>
                    <p>(Music) 12 fev </p>
                </li>
                <li class="related__item">
                    <a href="single-standard.html" class="related__link">
                        <img src="images/thumbs/masonry/walk-600.jpg" alt=""
                            style="height: 147px;width: 300px;object-fit: cover;">
                    </a>

                    <span>
                        <h5 class="related__post-title" style="margin-top: 1em;"> and Patterns in
                            Photography.</h5>
                        <p>(Music) 12 fev </p>
                    </span>
                </li>
                <li class="related__item">
                    <a href="single-standard.html" class="related__link">
                        <img src="images/thumbs/masonry/walk-600.jpg" alt=""
                            style="height: 147px;width: 300px;object-fit: cover;">
                    </a>

                    <h5 class="related__post-title" style="margin-top: 1em;">Using Repetition and Patterns in
                        Photography.</h5>
                    <p>(Music) 12 fev </p>
                </li>



            </ul>
            <a class="btn btn--primary full-width" href="#0">Ver todos em Musicas </a>

        </div>
        <hr>
        <div class="row">

            <h6 style="margin-top: 0;margin-bottom: 2em;"> &#9899; Ténis</h6>


            <ul class="related">

                <li class="related__item">

                    <a href="single-standard.html" class="related__link">
                        <img src="images/thumbs/masonry/walk-600.jpg" alt=""
                            style="height: 147px;width: 300px;object-fit: cover;">
                    </a>

                    <h5 class="related__post-title" style="margin-top: 1em;">Using Repetition and Patterns in
                        Photography.</h5>
                    <p>(Music) 12 fev </p>
                </li>
                <li class="related__item">
                    <a href="single-standard.html" class="related__link">
                        <img src="images/thumbs/masonry/walk-600.jpg" alt=""
                            style="height: 147px;width: 300px;object-fit: cover;">
                    </a>

                    <span>
                        <h5 class="related__post-title" style="margin-top: 1em;"> and Patterns in
                            Photography.</h5>
                        <p>(Music) 12 fev </p>
                    </span>
                </li>
                <li class="related__item">
                    <a href="single-standard.html" class="related__link">
                        <img src="images/thumbs/masonry/walk-600.jpg" alt=""
                            style="height: 147px;width: 300px;object-fit: cover;">
                    </a>

                    <h5 class="related__post-title" style="margin-top: 1em;">Using Repetition and Patterns in
                        Photography.</h5>
                    <p>(Music) 12 fev </p>
                </li>



            </ul>
            <a class="btn btn--primary full-width" href="#0">Ver todos em Ténis </a>

        </div>

        <hr>
        <div class="row">

            <h6 style="margin-top: 0;margin-bottom: 2em;"> &#9899; Hacktivismo</h6>


            <ul class="related">

                <li class="related__item">

                    <a href="single-standard.html" class="related__link">
                        <img src="images/thumbs/masonry/walk-600.jpg" alt=""
                            style="height: 147px;width: 300px;object-fit: cover;">
                    </a>

                    <h5 class="related__post-title" style="margin-top: 1em;">Using Repetition and Patterns in
                        Photography.</h5>
                    <p>(Music) 12 fev </p>
                </li>
                <li class="related__item">
                    <a href="single-standard.html" class="related__link">
                        <img src="images/thumbs/masonry/walk-600.jpg" alt=""
                            style="height: 147px;width: 300px;object-fit: cover;">
                    </a>

                    <span>
                        <h5 class="related__post-title" style="margin-top: 1em;"> and Patterns in
                            Photography.</h5>
                        <p>(Music) 12 fev </p>
                    </span>
                </li>
                <li class="related__item">
                    <a href="single-standard.html" class="related__link">
                        <img src="images/thumbs/masonry/walk-600.jpg" alt=""
                            style="height: 147px;width: 300px;object-fit: cover;">
                    </a>

                    <h5 class="related__post-title" style="margin-top: 1em;">Using Repetition and Patterns in
                        Photography.</h5>
                    <p>(Music) 12 fev </p>
                </li>



            </ul>
            <a class="btn btn--primary full-width" href="#0">Ver todos em Hacktivismo </a>

        </div>


    </div>
</div>

@section('js')
<script type='text/javascript' src='http://code.jquery.com/jquery-1.11.0.min.js'></script>
<script type="text/javascript">
    $(document).ready( function() {$( '.sidebar' ).fixedsticky();  });
</script>
<script src="https://cdn.rawgit.com/filamentgroup/fixed-sticky/master/fixedsticky.css"></script>
<script src="https://cdn.rawgit.com/filamentgroup/fixed-sticky/master/fixedsticky.js"></script>
@endsection
@endsection


{{-- SLIDE POSTS --}}
{{-- @foreach ($slidePosts as $slidePost)
{{$slidePost->slug}}
/storage/{{ $slidePost->image }}
{{$slidePost->created_at->format('F d, Y')}}
{{$slidePost->title}}
{{$slidePost->category->name}}
{{ substr($slidePost->excerpt,0, 40) }}

@endforeach --}}

{{-- @foreach ($posts as $post)
@include('partials.post',['post' => $post])
@endforeach --}}

{{-- PAGINATION --}}
{{-- {{$posts->links()}} --}}
