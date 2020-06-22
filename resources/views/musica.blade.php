@extends('layouts.index')
@section('page_title', '| Musica ')
@section('container')
<style>
    #top {

        background-color: white;

    }

    .s-footer {
        background-color: #f6f7f8;
        padding-top: 4rem;
        padding-bottom: 8rem;
        font-size: 1.6rem;
        line-height: 2.4rem;
        color: rgba(0, 0, 0, 0.5);
        text-align: center;
    }

    th,
    td {
        padding: 1.5rem 3.2rem;
        text-align: left;
        border-bottom: 1px solid #e0e0e000;
    }


    @media screen and (min-width: 601px) {
        .display-1 {
            font-size: 2vw;
            line-height: 1.143;
            letter-spacing: -0.05rem;
            margin-top: .5em;
            margin-bottom: 0.8rem;
        }



        .FeaturedMusicGrid_img {

            max-width: 616px;
            height: auto;
        }
    }

    @media screen and (min-width: 1024px) {

        .FeaturedMusicGrid_img {

            min-width: 616px;
            height: auto;
        }
    }

    /* If the screen size is 600px wide or less, set the font-size of <div> to 30px */
    @media screen and (max-width: 600px) {
        .display-1 {
            font-size: 8vw;
            line-height: 1.143;
            letter-spacing: -0.05rem;
            margin-top: .5em;
            margin-bottom: 0.8rem;
        }



        .content__page-header {
            text-align: center;
            margin-bottom: 4rem;
            margin-left: 1em;
            margin-right: 1.5em;
        }

        #heroMusic {
            padding-bottom: 0;
            padding-top: 4.2em;
        }
    }
</style>

<div class="s-content" id="heroMusic" style="background-color: white;padding-bottom:0px;">
    @foreach ($FeaturedMusic as $post)

    <article class="column large-full entry format-standard">

        <div class="media-wrap entry__media" style="margin-bottom: 0;">
            <div class="entry__post-thumb">
                <img src="/storage/{{ $post->image }}" alt="">
            </div>
            <div class="content__page-header entry__header">
                <h1 class="display-1 entry__title text-left">
                    {{ substr($post->title,0, 70) }}
                </h1>
                <table class="table table-light">
                    <tbody>
                        <tr>
                            <td class="category_td" style="padding-right: 0;width: 2%;"> <a href=""
                                    style="color: black">({{$post->category->name}})</a>
                            </td>
                            <td style="padding-left: 8px;"> {{ Date::parse($post->created_at)->format('d F, Y') }}
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>



            </div>
        </div>

    </article>
    @endforeach
</div>
<div class="s-content" style="background-color: white;padding-top:0px;">
    <hr>
    <h6 style="margin-top: 0;margin-bottom: 2em;font-weight: 400;letter-spacing: 0px;text-align:left;"> &#9899; Em
        destaque </h6>
    <div class="masonry-wrap">



        <div class="masonry">

            <div class="grid-sizer"></div>

            @foreach ($FeaturedMusicGrid as $post)
            @include('partials.post_no_desc',['post' => $post])
            @endforeach



        </div> <!-- end masonry -->

    </div> <!-- end masonry-wrap -->


</div>




<div class="s-content" style="background-color: white;padding-top:0px;">
    <div class="masonry-wrap">
        <hr>
        <h6 style="margin-top: 0;margin-bottom: 2em;font-weight: 400;letter-spacing: -.5px;"> &#9899; Mais Recente</h6>

        <div class="row col-12">



            @foreach ($lastMusicPosts as $post)

            <table class="table table-dark">
                <tbody>
                    <tr>
                        <td style="padding-left: 0;">

                            <div class="FeaturedMusicGrid_img"> <img class="FeaturedMusicGrid_img"
                                    src="/storage/{{ $post->image }}" alt="Nature" class="responsive">
                                <h3 style="margin-top: 0;">{{$post->title}}</h3>
                                <p style="margin-bottom:0px;">({{$post->category->name}})
                                    {{ Date::parse($post->created_at)->format('d F, Y') }}</p>
                                <hr class="FeaturedMusicGrid_img">
                            </div>


                        </td>
                    </tr>
                </tbody>
            </table>
            @endforeach



        </div>


    </div> <!-- end masonry -->

</div>


<div class="s-content" style="background: url(images/wheel-1000.jpg);background-color:#1a1a1a;">


    @include('partials.newsletter')
</div>



@stop
