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
    hr {
        border: solid #000000;
        border-width: 1px 0 0;
        clear: both;
        margin: 1.5rem 0 1.6rem;
        height: 0;
        margin-top: 0px;
    }

    .maisEm_p {
        font-size: medium;
        margin-bottom: .4em;
    }

    @media only screen and (min-width: 814px) {
        #relatedItem {
            float: left;
            width: 19.33333%;
            padding-left: 4rem;
            margin-bottom: 3.2rem;
        }
    }
</style>

{{-- <div class="s-content" style="background-color: white;padding-top:0px;">

    <div class="row"></div>
</div> --}}
<div class="s-content" style="background-color: white;padding-top:0px;">

    <div class="col-12" style="padding: 20px;">
        <hr style="margin-top: 4em;">
        <h6 style="margin-top: 0;margin-bottom: 2em;"> &#9899; Em Destaque</h6>
    </div>
    <div class="masonry-wrap">

        <div class="masonry" style="position: relative; height: 423.418px;">
            <div class="grid-sizer"></div>
            <?php $count = 0; ?>
            @foreach ($posts as $post)
            <?php if($count == 2) break; ?>
            @include('partials.post_no_desc',['post' => $post])
            <?php $count++; ?>
            @endforeach
        </div>

        {{-- More music --}}
        <div class="col-12" style="padding: 20px;">
            {{-- <hr style="margin-top: 4em;">
            <h6 style="margin-top: 0;margin-bottom: 2em;"> &#9899; Recentes</h6> --}}
            <ul class="related">
                <?php $count = 0; ?>
                @foreach ($posts as $post)
                <?php if($count == 3) break; ?>
                <li class="related__item">

                    <a href="/post/{{$post->slug}}" class="related__link">
                        <img src="/storage/{{ $post->image }}" alt=""
                            style="height: auto;width: 300px;object-fit: cover;">
                    </a>

                    <div style="height: 70px;width: 270px;">
                        <h5 class="related__post-title"
                            style="margin-top: 1em;Adidas comes out with a new pair to celebrate skeezrxcco NY store launch">
                            {{ substr($post->title,0, 67) }}</h5>
                    </div>
                    <p class="maisEm_p">({{$post->category->name}})
                        {{ Date::parse($post->created_at)->format('d F, Y') }} </p>
                    <hr>
                </li>
                <?php $count++; ?>
                @endforeach
            </ul>

        </div>
        <div class="row">

        </div>

        {{-- More music --}}
        <div class="col-12" style="padding: 20px;">
            <hr style="margin-top: 4em;">
            <h6 style="margin-top: 0;margin-bottom: 2em;"> &#9899; Recentes</h6>
            <ul class="related">
                <?php $counter = 0; ?>
                @foreach ($posts as $post)
                <?php if($counter == 21) break; ?>
                <li class="related__item">

                    <a href="/post/{{$post->slug}}" class="related__link">
                        <img src="/storage/{{ $post->image }}" alt=""
                            style="height: auto;width: 300px;object-fit: cover;">
                    </a>

                    <div style="height: 70px;width: 270px;">
                        <h5 class="related__post-title"
                            style="margin-top: 1em;Adidas comes out with a new pair to celebrate skeezrxcco NY store launch">
                            {{ substr($post->title,0, 67) }}</h5>
                    </div>
                    <p class="maisEm_p">({{$post->category->name}})
                        {{ Date::parse($post->created_at)->format('d F, Y') }} </p>
                    <hr>
                </li>
                <?php $counter++; ?>
                @endforeach
            </ul>

        </div>
        <div class="row">

        </div>




    </div>
</div>

<div class="s-content" style="background: url(images/wheel-1000.jpg);background-color:#1a1a1a;">


    @include('partials.newsletter')
</div>

<div class="s-content" style="background-color: white;padding-top:0px;">

    <div class="masonry-wrap">
        {{-- More music --}}
        <div class="col-12" style="padding: 20px;">
            <hr style="margin-top: 4em;">
            <h6 style="margin-top: 0;margin-bottom: 2em;"> &#9899; Disponivel</h6>
            <ul class="related">
                <?php $counter = 0; ?>
                @foreach ($posts as $post)
                <?php if($counter == 5) break; ?>
                <li class="related__item" id="relatedItem">

                    <a href="/post/{{$post->slug}}" class="related__link">
                        <img src="/storage/{{ $post->image }}" alt=""
                            style="height: auto;width: 300px;object-fit: cover;">
                    </a>

                    <div class="relatedItemText">
                        <h5 class="related__post-title" style="margin-top: 1em;font-size: 1.2rem;">
                            {{ substr($post->title,0, 67) }}</h5>
                    </div>


                </li>
                <?php $counter++; ?>
                @endforeach
            </ul>

        </div>
    </div>
</div>



<div class="s-content" style="background-color: white;padding-top:0px;">

    <div class="row"></div>
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
