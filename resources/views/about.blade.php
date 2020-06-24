@extends('layouts.index')
@section('page_title', '| Sobre ')
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

        div#fashion {
            display: none;
        }

        .protest_img {
            height: 1000px;
            object-fit: cover;
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

{{--background video styles     --}}
<style>
    @font-face {
        font-family: Moderne Sans;
        src: url(https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/moderne_sans.woff2);
    }




    video {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 26.8%;
        -o-object-fit: cover;
        object-fit: scale-down;
        -o-object-position: center;
        object-position: center;
    }

    div#fashion {
        min-height: 100vh;
        display: -webkit-box;
        display: flex;
        -webkit-box-align: center;
        align-items: center;
        -webkit-box-pack: center;
        justify-content: center;
    }

    #fashion_text {
        font-size: 18.7vmin;
        text-align: center;
        margin: 2rem 3rem 0;
        mix-blend-mode: difference;
        color: #fff;
        font-weight: bolder;
    }

    @media screen and (max-width: 600px) {

        div#fashion h2 {
            display: none;
        }

        #fashion_video {

            object-fit: cover;
        }
    }

    @media screen and (min-width: 600px) {}
</style>



{{-- Video Hero --}}
<div class="s-content" id="heroMusic" style="padding-bottom:0px;padding-top: 0;">
    <video id="fashion_video" poster="/storage/aboutskeez.jpg" playsinline autoplay muted loop>
        <source src="" type="video/webm">
        <source src="/storage/aboutskeez.mp4" type="video/mp4">
    </video>

    <div id="fashion">

        <h2 id="fashion_text">Skeezrxcco</h2>

    </div>

</div>
<div class="s-content" style="background-color: white;padding-top:0px;">
    <hr>

    <div class="masonry-wrap">
        <div class="masonry">
            <div class="grid-sizer"></div>

        </div>
    </div>
</div>

<div class="s-content" style="background: url(images/wheel-1000.jpg);background-color:#1a1a1a;">


    @include('partials.newsletter')
</div>
<div class="s-content">

    <main class="row content__page">

        <section class="column large-full entry format-standard">

            <div class="media-wrap">
                <div>
                    <img src="images/thumbs/about/about-1000.jpg" srcset="images/thumbs/about/about-2000.jpg 2000w,
                              images/thumbs/about/about-1000.jpg 1000w,
                              images/thumbs/about/about-500.jpg 500w" sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                </div>
            </div>

            <div class="content__page-header">
                <h1 class="display-1">
                    Hey!
                </h1>
            </div> <!-- end content__page-header -->


            <p>
                Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat
                dolor sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit
                id fugiat enim mollit amet anim veniam dolor dolor irure velit commodo cillum sit
                nulla ullamco magna amet magna cupidatat qui labore cillum sit in tempor veniam
                consequat non laborum adipisicing aliqua ea nisi sint ut quis proident ullamco ut
                dolore culpa occaecat.
            </p>

            <h2>A nossa História</h2>

            <p>
                Odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti
                dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique
                sunt in culpa. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis

                <p>
                    Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor
                    sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat enim
                    mollit amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco. Lorem
                    ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat aute.
                </p>

                <hr>

                <div class="row block-large-1-2 block-tab-full">
                    <div class="column">
                        <h4>Nós somos. </h4>
                        <p>Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui
                            sit ex occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit
                            aliquip magna nisi consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.
                        </p>
                    </div>

                    <div class="column">
                        <h4>A nossa Missão.</h4>
                        <p>Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui
                            sit ex occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit
                            aliquip magna nisi consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.
                        </p>
                    </div>

                    <div class="column">
                        <h4>A nossa Visão.</h4>
                        <p>Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui
                            sit ex occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit
                            aliquip magna nisi consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.
                        </p>
                    </div>

                    <div class="column">
                        <h4>Os nossos valores de Base.</h4>
                        <p>Lorem ipsum Nisi amet fugiat eiusmod et aliqua ad qui ut nisi Ut aute anim mollit fugiat qui
                            sit ex occaecat et eu mollit nisi pariatur fugiat deserunt dolor veniam reprehenderit
                            aliquip magna nisi consequat aliqua veniam in aute ullamco Duis laborum ad non pariatur sit.
                        </p>
                    </div>

                </div>

        </section>

    </main>

</div>



@stop

@section('js')

@endsection
