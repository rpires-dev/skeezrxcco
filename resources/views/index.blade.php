@extends('layouts.index')
@section('page_title', '| Home Page ')
@section('container')
@section('css')
<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Sedgwick+Ave+Display&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://cdn.rawgit.com/filamentgroup/fixed-sticky/master/fixedsticky.css">
<link rel="stylesheet" href="/css/custom.css">
@endsection
<style>
    /* ~ #b  */
</style>

<div class="s-content" style="background-color: white;">

    {{-- Hero Slider --}}
    <article class="column large-full entry format-gallery">

        <div class="media-wrap entry__media">
            <div class="entry__slider slider">
                <div class="slider__slides">
                    @foreach ($gridPosts as $post)
                    <a href="/post/{{$post->slug}}">
                        <div class="slider__slide" id="hero_slideImg">
                            <img src="/storage/{{ $post->image }}" id="hero_slide_Img" alt="">
                            <div class="bottom-left d-flex">


                                <h2 class="sliderText" id="sliderText_hero">
                                    {{$post->title}}</h2>

                                <div class="col-3" style="color: black; ">
                                    <table class="table table-light">
                                        <tbody>
                                            <tr>
                                                <td class="category_td"
                                                    style="color: black;padding-right: 0;width: 2%;"> <a
                                                        href="/category/{{$post->category->slug}}"
                                                        style="color: black">({{$post->category->name}})</a>
                                                </td>
                                                <td style="padding-left: 8px;">
                                                    {{ Date::parse($post->created_at)->format('d F, Y') }}

                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </a>
                    @endforeach

                </div>
                <hr>
            </div>
        </div>


    </article> <!-- end column large-full entry-->



    {{-- DoubleGrid News --}}
    <div class="masonry-wrap">
        <div class="masonry">
            <div class="grid-sizer"></div>
            <?php $count = 0; ?>
            @foreach ($doubleGrid as $post)
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


            <p style="margin-top: 2px;"> <span> &#x26A1;</span> Ultimas noticias</p>
        </div>
        <?php $count = 0; ?>
        @foreach ($latests as $post)
        <?php if($count == 7) break; ?>
        <a href="/post/{{$post->slug}}">
            <div class="column large-full">
                <div class="table-responsive" id="table-responsive">

                    <table style="margin-bottom: 0px;">

                        <tbody>
                            <tr>
                                <td class="image_grid_" rowspan="2" style="padding: 0; ">
                                    <img class="image_grid_img" id="image" src="/storage/{{ $post->image }}" alt=""
                                        style="
                                margin-top: .5em;
                            "></td>
                                <td style="vertical-align: top;padding-left:0px;">
                                    <h3 style="margin-top: 0;" class="title_grid_">{{ $post->title }}
                                    </h3>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-bottom: 0;padding-left: 0;">
                                    <p style="margin-bottom:0px;" class="date_grid_">({{$post->category->name}})
                                        {{ Date::parse($post->created_at)->format('d F, Y') }}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <hr style="margin: 0;">
                </div>

            </div>
        </a>
        <?php $count++; ?>
        @endforeach

    </div>

    <div class="masonry-wrap">
        <div class="row col-12" style="margin-left: 0;padding-left: 0;width:100%;">
            <div class="column large-8 tab-full">

                {{-- Last featured  --}}
                @foreach ($featuredSingle as $post)
                <div class="table" id="table-responsive_single">
                    <table class="table table-dark">
                        <tbody>
                            <tr>
                                <td style="padding-left: 0;">
                                    <div class="d-flex flex-column-reverse">
                                        <div><img src="/storage/{{ $post->image }}" id="image_single" alt="Nature"
                                                class="responsive" width="600" height="400" style="max-width: 616px; ">
                                            <h3 id="title_single" style="margin-top: 0;">{{$post->title}}</h3>
                                            <p style="margin-bottom:0px;">({{$post->category->name}})
                                                {{ Date::parse($post->created_at)->format('d F, Y') }}</p>
                                            <hr style="max-width: 616px; ">
                                        </div>


                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endforeach

                </div>
                <?php $count = 0; ?>
                @foreach ($posts as $post)
                <?php if($count == 20) break; ?>


                <div class="column" style="padding-right: 0px; padding-left: 0px;">
                    <div class="table-responsive" id="table-responsive_rest">

                        <table style="margin-bottom: 0px;">

                            <tbody>
                                <tr>
                                    <td class="image_grid_" rowspan="2" style="padding: 0; ">
                                        <img class="image_grid_img" id="image_rest" src="/storage/{{$post->image}}"
                                            alt="">
                                    </td>
                                    <td style="vertical-align: top;padding-left:0px;padding-top:0px;">
                                        <h3 style="margin-top: 0;" id="title_rest" class="title_grid_">{{$post->title}}
                                        </h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="padding-bottom: 0;padding-left: 0;">
                                        <p style="margin-bottom:0px;" class="date_grid_">({{$post->category->name}})
                                            {{ Date::parse($post->created_at)->format('d F, Y') }}</p>
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

            <div class="column large-4 tab-full" style="padding-right: 0;">

                <aside class="sidebar fixedsticky">
                    <hr style="margin-top: 0;">
                    <h6 style="margin-top: 0;margin-bottom: 2em;"> &#9899; POPULARES</h6>



                    <div class="table-responsive">



                        <?php $count = 0; ?>
                        <?php $postCount = 1; ?>
                        @foreach ($posts as $post)
                        <?php if($count ==5) break; ?>
                        <div class="container">
                            <table class="table_sticky" id="stickyWrap" style="margin-bottom: 0px;">

                                <tbody>
                                    <tr>
                                        <td class="image_grid_" id="image_grid_" rowspan="2" style="padding: 0; ">
                                            <div class="container">
                                                <div class="text-block">
                                                    <p style="margin-bottom: 0;font-size:small; ">{{$postCount}}</p>
                                                </div> <img class="image_grid_img" id="stickyimage"
                                                    src="storage/{{$post->image}}" alt="">

                                            </div>

                                        </td>
                                        <td id="sticky_title_td"
                                            style="vertical-align: top;padding-left:0px;padding-top:0px;">
                                            <h3 style="margin-top: 0;" id="sticky_title" class="title_grid_">
                                                {{$post->title}}
                                            </h3>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="padding-bottom: 0;padding-left: 0;">
                                            <p style="margin-bottom:0px;" id="sticky_subtitle" class="date_grid_">
                                                ({{$post->category->name}})
                                                {{ Date::parse($post->created_at)->format('d F, Y') }}
                                            </p>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <?php $postCount++; ?>
                        <?php $count++; ?>
                        @endforeach
                    </div>


                </aside>
            </div>

        </div>
    </div>


</div>
{{-- NEWSLETTER --}}
<div class="s-content" style="background: url(images/wheel-1000.jpg);background-color:#1a1a1a;">


    @include('partials.newsletter')
</div>
{{-- More in. --}}
<div class="s-content" style="background-color: white;">
    <div class="masonry-wrap">

        <div class="masonry" style="position: relative; height: 423.418px;">

            <div class="grid-sizer"></div>

        </div>

        {{-- More music --}}
        <div class="col-12" style="padding: 20px;">
            <hr>
            <h6 style="margin-top: 0;margin-bottom: 2em;"> &#9899; Musicas</h6>
            <ul class="related">
                <?php $count = 0; ?>
                @foreach ($moreMusic as $post)
                <?php if($count == 3) break; ?>
                <li class="related__item">

                    <a href="single-standard.html" class="related__link">
                        <img src="/storage/{{ $post->image }}" alt=""
                            style="height: auto;width: 300px;object-fit: cover;">
                    </a>

                    <div style="height: 50px;width: 270px;">
                        <h5 class="related__post-title" style="margin-top: 1em;">
                            {{ substr($post->title,0, 65) }}</h5>
                    </div>
                    <p class="maisEm_p">({{$post->category->name}})
                        {{ Date::parse($post->created_at)->format('d F, Y') }} </p>
                </li>
                <?php $count++; ?>
                @endforeach
            </ul>
            <div> <a class="btn btn--primary full-width" href="{{url('musica')}}">Ver todos em Musicas </a></div>
        </div>
        {{-- More tenis --}}
        <div class="col-12" style="padding: 20px;">
            <hr>
            <h6 style="margin-top: 0;margin-bottom: 2em;"> &#9899; Ténis</h6>
            <ul class="related">
                <?php $count = 0; ?>
                @foreach ($moreTenis as $post)
                <?php if($count == 3) break; ?>
                <li class="related__item">

                    <a href="/post/{{$post->slug}}" class="related__link">
                        <img src="/storage/{{ $post->image }}" alt=""
                            style="height: auto;width: 300px;object-fit: cover;">
                    </a>

                    <div style="height: 50px;width: 270px;">
                        <h5 class="related__post-title" style="margin-top: 1em;">
                            {{ substr($post->title,0, 65) }}</h5>
                    </div>
                    <p class="maisEm_p">({{$post->category->name}})
                        {{ Date::parse($post->created_at)->format('d F, Y') }} </p>
                </li>
                <?php $count++; ?>
                @endforeach
            </ul>
            <div> <a class="btn btn--primary full-width" href="{{url('tenis')}}">Ver todos em Ténis </a></div>
        </div>
        {{-- More hacktivismo  --}}
        <div class="col-12" style="padding: 20px;">
            <hr>
            <h6 style="margin-top: 0;margin-bottom: 2em;"> &#9899; #Hacktivismo</h6>
            <ul class="related">
                <?php $count = 0; ?>
                @foreach ($moreHacktivismo as $post)
                <?php if($count == 3) break; ?>
                <li class="related__item">

                    <a href="/post/{{$post->slug}}" class="related__link">
                        <img src="/storage/{{ $post->image }}" alt=""
                            style="height: auto;width: 300px;object-fit: cover;">
                    </a>

                    <div style="height: 50px;width: 270px;">
                        <h5 class="related__post-title" style="margin-top: 1em;">
                            {{ substr($post->title,0, 65) }}</h5>
                    </div>
                    <p class="maisEm_p">({{$post->category->name}})
                        {{ Date::parse($post->created_at)->format('d F, Y') }} </p>
                </li>
                <?php $count++; ?>
                @endforeach
            </ul>
            <div> <a class="btn btn--primary full-width" href="{{url('hacktivismo')}}">Ver todos em Hacktivismo </a>
            </div>
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
