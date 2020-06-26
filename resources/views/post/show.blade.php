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
    #avatar_reply {
        margin-left: 20px;
    }

    .comment ul.children {
        margin: 0;
        margin-left: 20px;
        padding: 0;
    }

    textarea {
        min-height: 0;
        color: black;
    }

    /* .replyForm {
        display: none;
    } */

    @media screen and (max-width:390px) {
        .content__page-header {
            text-align: center;
            margin-bottom: 1rem;
        }

        .entry__header-meta li {
            color: gray;
            display: inline-block;
            padding-left: 0;
            margin: 0 0;
            font-size: x-small;
        }

        .entry__header-meta {
            text-align: left;
            font-size: 0.9rem;
            font-weight: 500;
            line-height: 1.778;
            margin-left: 0;
            color: #a09c9c;
            margin-bottom: 0;
        }


        #postImage {
            height: 428px;
            width: auto;
            object-fit: cover;
        }

        #notMobileTitle {
            display: none;
        }
    }

    @media screen and (min-width:390px) {
        .entry__header-meta li {
            color: gray;
            display: inline-block;
            padding-left: 0;
            margin: 0 0;
            font-size: small;
        }

        .entry__header-meta {
            text-align: left;
            font-size: 0.9rem;
            font-weight: 500;
            line-height: 1.778;
            margin-left: 0;
            color: gray;
            margin-bottom: 0;
        }

        #postImage {
            height: 428px;
            width: auto;
            object-fit: cover;
        }

        #mobileTitle {
            display: none;
        }
    }

    @media screen and (max-width:1024px) and (min-width:768px) {
        #postImage {
            height: 118.8vw;
            width: auto;
            object-fit: cover;
        }
    }

    @media screen and (min-width:900px) {

        #postBody {
            width: 111%;
        }
    }



    @media screen and (max-width: 400px) {

        .masonry-wrap,
        .listing-header {
            padding-left: 0;
            padding-right: 0;
        }
    }

    @media screen and (max-width: 600px) {
        #socialTable {
            display: none;
        }

        .masonry-wrap,
        .listing-header {
            width: auto;
            max-width: 500px;
        }
    }

    @media screen and (min-width: 600px) {
        .display-1 {
            text-align: left;
            font-size: 4.6rem;
            line-height: 1.143;
            letter-spacing: -0.05rem;
            margin-top: 0;
            margin-bottom: 0.8rem;
        }
    }

    .socialButton {
        padding: 1.5rem 3.2rem;
        text-align: left;
        border-bottom: 1px solid #e0e0e0;
        padding-right: 5px;
        padding-left: 5px;
    }

    #popularBody {
        padding-bottom: 20px;
    }

    .fixedsticky {
        top: 0px;
        padding-top: 90px;
    }

    #popularesImg {
        margin: 0px
    }



    .entry__header-meta {
        text-align: left;
        list-style: none;
        font-size: 1.8rem;
        font-weight: 300;
        line-height: 1.778;
        margin-left: 0;
        color: #000000;
    }

    hr {
        border: solid #000000;
        border-width: 1px 0 0;
        clear: both;
        margin: 2.4rem 0 1.6rem;
        height: 0;
        margin-top: 2px;
    }

    .entry__related {
        border-top: 1px solid rgb(0, 0, 0);
    }

    .entry__pagenav {
        margin-top: 10.2rem;
        padding-top: 2rem;
        border-top: 1px solid rgb(0, 0, 0);
        position: relative;
    }

    #comments {
        padding-top: 2rem;
        padding-bottom: 1.2rem;
        border-top: 1px solid rgb(0, 0, 0);
    }
</style>

<div class="s-content" style="background-color: white;padding-bottom:0px;">
    <main class="row content__page">

        <article class="column large-full entry format-standard">
            <div id="mobileTitle" class="content__page-header entry__header">
                <h1 id="postTitle" class="display-1 entry__title" style="text-align: left;font-size:24px;">
                    {{$post->title}}
                </h1>
                <ul class=" entry__header-meta">
                    <li class="author">Por <a href="#0">{{$post->author->name}}</a></li>
                    <li class="cat-links">
                        <a href="#">em {{$post->category->name}}</a>

                    </li>
                    <li class="date">&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i>
                        {{Date::parse($post->created_at)->format('d F, Y')}}

                    </li>

                </ul>
            </div>

            <div class="media-wrap entry__media">
                <div class="entry__post-thumb">
                    <img src="/storage/{{ $post->image }}" id="postImage" sizes="(max-width: 2000px) 100vw, 2000px"
                        alt="">
                </div>
                <ul class="entry__header-meta">

                    <li class="date">&nbsp;<i class="fa fa-camera" aria-hidden="true"></i>
                        &nbsp; Getty

                    </li>

                </ul>
            </div>


        </article>


        <div class="masonry-wrap">
            <div id="postBody" class="row col-12" style="margin-left: 0;padding-left: 0;">

                <div class="column large-8 tab-full">


                    {{-- Last featured  --}}

                    <article class="column large-full entry format-standard" style="
                    padding: 0; ">
                        <div id="notMobileTitle" class="content__page-header entry__header">
                            <h1 id="postTitle" class="display-1 entry__title">
                                {{$post->title}}
                            </h1>
                            <ul class="entry__header-meta">
                                <li class="author">Por <a href="#0">{{$post->author->name}}</a></li>
                                <li class="cat-links">
                                    <a href="#">em {{$post->category->name}}</a>

                                </li>
                                <li class="date">&nbsp;<i class="fa fa-clock-o" aria-hidden="true"></i>
                                    {{Date::parse($post->created_at)->format('d F, Y')}}

                                </li>

                            </ul>

                            <table id="socialTable" class="table table-light">
                                <tbody>
                                    <tr>
                                        <td class="socialButton" style="width: 16vw;font-size: smaller;">
                                            <div style="text-align: center;background-color: #3b5998;color: white;font-family: inherit;    padding: 2px;"
                                                class="fb_btn"><i class="fa fa-facebook"
                                                    aria-hidden="true">&nbsp;</i>Partilhar</div>
                                        </td>
                                        <td class="socialButton" style="width: 16vw;font-size: smaller;">
                                            <div style="text-align: center;background-color: #55acee;color: white;font-family: inherit;    padding: 2px;"
                                                class="fb_btn"><i class="fa fa-twitter"
                                                    aria-hidden="true">&nbsp;</i>Tweetar</div>
                                        </td>
                                        <td class="socialButton" style="width: 16vw;font-size: smaller;">
                                            <div style="text-align: center;background-color: #444;color: white;font-family: inherit;    padding: 2px;"
                                                class="fb_btn"><i class="fa fa-envelope"
                                                    aria-hidden="true">&nbsp;</i>Email
                                            </div>
                                        </td>
                                        <td class="socialButton" style="width: 16vw;font-size: smaller;">
                                            <div style="text-align: center;background-color:gray;color: white;font-family: inherit;    padding: 2px;"
                                                class="fb_btn"><i class="fa fa-comment"
                                                    aria-hidden="true">&nbsp;</i>Comentários</div>
                                        </td>




                                    </tr>
                                </tbody>
                            </table>
                        </div>



                        <div class="entry__content">
                            <p>
                                {{strip_tags($post->body)}}
                                Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                                McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of
                                the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through
                                the cites of the word in classical literature, discovered the undoubtable source. Lorem
                                Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The
                                Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the
                                theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum,
                                "Lorem ipsum dolor sit amet..", comes from a line in section 1.10.32.

                                The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those
                                interested. Sections 1.10.32 and 1.10.33 from "de Finibus Bonorum et Malorum" by Cicero
                                are also reproduced in their exact original form, accompanied by English versions from
                                the 1914 translation by H. Rackham.
                            </p>

                            @if($post->tags->isNotEmpty())

                            <p class="entry__tags">
                                <span>Tags deste Artigo </span>

                                <span class="entry__tag-list">
                                    @foreach($post->tags as $tag)

                                    <a href="#">{{$tag->name}}</a>
                                    @endforeach

                                </span>

                            </p>
                            @else

                            @endif


                        </div> <!-- end entry content -->
                    </article>
                </div>

                {{-- StickySideBar --}}

                <hr style="margin-top: 0;">
                <div class="column large-4 tab-full" style="padding-right: 0;">

                    <aside class="sidebar fixedsticky">
                        <hr>
                        <h6 style="margin-top: 0;margin-bottom: 2em;"> &#9899; POPULARES</h6>
                        <div class="table-responsive">
                            <?php $count = 0; ?>
                            <?php $postCount = 1; ?>
                            @foreach ($posts as $post)
                            <?php if($count ==5) break; ?>
                            <div id="popularBody" class="container">
                                <table class="table_sticky" style="margin-bottom: 0px;">

                                    <tbody>
                                        <tr>
                                            <td class="image_grid_" id="image_grid_" rowspan="2" style="padding: 0; ">
                                                <div class="container">
                                                    <div class="text-block">
                                                        <p style="margin-bottom: 0;font-size:small; ">{{$postCount}}</p>
                                                    </div> <img id="popularesImg" class="image_grid_img"
                                                        src="/storage/{{$post->image}}" alt="">

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

                        <hr style="margin-top: .5em;">
                    </aside>
                </div>

            </div>
        </div>
    </main>
</div>
<div class="s-content" style="background-color: white;padding-top:0px;">
    <main class="row content__page">

        <article class="column large-full entry format-standard">
            {{-- Next/ post --}}
            {{-- <div class="entry__pagenav">
                                <div class="entry__nav">
                                    <div class="entry__prev">
                                        @if (isset($previous))

                                        <a href="/post/{{$previous->slug}}" rel="prev">
            <span>Artigo anterior</span>
            {{ $previous->title }}
            </a>
            @endif


</div>
<div class="entry__next">
    @if (isset($next))
    <a href="/post/{{$next->slug}}" rel="next">
        <span>Próximo artigo</span>
        {{ $next->title }}
    </a>
    @endif

</div>
</div>
</div>
<div class="entry__related">
    @if ($relatedPosts->isNotEmpty())
    <h3 class="h2">Artigos Relacionados</h3>

    <ul class="related">

        @foreach($relatedPosts as $relatedPost)
        <li class="related__item">
            <a href="/post/{{$relatedPost->slug}}" class="related__link">
                <img src="/storage/{{ $relatedPost->image }}" alt="">
            </a>
            <h5 class="related__post-title"> {{ $relatedPost->title }}</h5>
        </li>
        @endforeach

    </ul>
    @endif
</div>
--}}


<hr style="margin-top: 4em;">
<div class="col-12" style="padding: 20px;">
    <h6 style="margin-top: 0;margin-bottom: 2em;"> &#9899; Recomendado</h6>
    <ul class="related">
        <?php $counter = 0; ?>
        @foreach ($posts as $post)
        <?php if($counter == 21) break; ?>
        <li class="related__item">

            <a href="single-standard.html" class="related__link">
                <img src="/storage/{{ $post->image }}" alt=""
                    style="height: auto;width: 300px;object-fit: cover;margin-bottom: 0.5em;">
            </a>

            <div style="height: 70px;width: 270px;">
                <h5 class="related__post-title" style="font-size: medium;margin-top: 1em;margin-top:0;">
                    {{ substr($post->title,0, 67) }}</h5>
            </div>
            <p class="maisEm_p" style="font-size: small; margin-bottom:0px;">({{$post->category->name}})
                {{ Date::parse($post->created_at)->format('d F, Y') }} </p>
            <hr style="    margin-top: 2px;">
        </li>
        <?php $counter++; ?>
        @endforeach
    </ul>

</div>

</article> <!-- end column large-full entry-->


<div class="comments-wrap" style="    width: inherit;">
    <div class="column large-12 comment-respond">

        <!-- START respond -->
        <div id="respond">

            <h3 class="h2">Add Comment <span>Your email address will not be published</span></h3>

            <form name="contactForm" id="contactForm" method="POST" action="{{route('comments.store',$post)}}"
                autocomplete="off">
                @csrf
                <fieldset>
                    {{--
                    <div class="form-field">
                        <input name="cName" id="cName" class="full-width" placeholder="Your Name" value="" type="text">
                    </div>

                    <div class="form-field">
                        <input name="cEmail" id="cEmail" class="full-width" placeholder="Your Email" value=""
                            type="text">
                    </div> --}}

                    {{-- <div class="form-field">
                        <input name="cWebsite" id="cWebsite" class="full-width" placeholder="Website" value=""
                            type="text">
                    </div> --}}

                    <div class="message form-field">
                        <textarea name="content" id="cMessage" class="full-width @error('content') is-invalid @enderror"
                            placeholder="Your Message"></textarea>
                    </div>

                    @error('content')
                    <div class="invalid-feedback ">{{$errors->first('content')}}</div>
                    @enderror



                    <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width"
                        value="Enviar" type="submit">

                </fieldset>
            </form> <!-- end form -->

        </div>
        <!-- END respond-->

    </div>
    <div id="comments" class="column large-12">

        <h3 class="h2">{{count($post->comments)}} Comentários</h3>

        <!-- START commentlist -->
        <ol class="commentlist">

            @forelse ($post->comments as $comment)
            <li class="thread-alt depth-1 comment">

                <div class="comment__avatar">
                    <img class="avatar" src="/storage/{{$comment->user->avatar ?? 'profile.png'}}" alt="" width="50"
                        height="50">
                </div>

                <div class="comment__content">

                    <div class="comment__info">
                        <div class="comment__author">{{$comment->user->name}}</div>

                        <div class="comment__meta">
                            <div class="comment__time"> {{ Date::parse($comment->created_at)->format('d F, Y') }}</div>
                            @auth
                            <div class="comment__reply">
                                <a id="commentReplyId" onclick="toggleReplyComment({{$comment->id}})"
                                    class="comment-reply-link" href="#0">Responder</a>
                            </div>


                            @endauth
                        </div>
                    </div>

                    <div class="comment__text">
                        <p>{{$comment->content}}
                        </p>
                    </div>

                </div>

                @auth
                {{-- REPLY FORM --}}
                <form action="{{route('comments.storeReply',$comment)}}" method="POST"
                    id="replyComment-{{ $comment->id}}" class="replyForm" autocomplete="off">
                    @csrf
                    <fieldset>

                        <div class="message form-field">
                            <textarea name="replyComment" id="replyComment" rows="4" cols="50"
                                class="full-width @error('replyComment') is-invalid @enderror"
                                placeholder="Your Message"></textarea>
                        </div>

                        @error('replyComment')
                        <div class="invalid-feedback ">{{$errors->first('replyComment')}}</div>
                        @enderror



                        <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width"
                            value="Responder" type="submit" style=" width: 36%;">

                    </fieldset>
                </form>
                @endauth
                @foreach ($comment->comments as $replyComment)
                <ul class="children">

                    <li class="depth-2 comment">

                        <div class="comment__avatar" id="avatar_reply">
                            <img class="avatar" src="/storage/{{$replyComment->user->avatar ?? 'profile.png'}}" alt=""
                                width="50" height="50">
                        </div>

                        <div class="comment__content">

                            <div class="comment__info">
                                <div class="comment__author">{{$replyComment->user->name}}</div>

                                <div class="comment__meta">
                                    <div class="comment__time">
                                        {{ Date::parse($replyComment->created_at)->format('d F, Y') }}</div>
                                    @auth
                                    {{-- <div class="comment__reply">
                                        <a id="commentReplyId" onclick="toggleReplyComment({{$replyComment->id}})"
                                    class="comment-reply-link" href="#0">Responder</a>
                                </div> --}}


                                @endauth
                            </div>
                        </div>

                        <div class="comment__text">
                            <p>{{$replyComment->content}}
                            </p>
                        </div>

    </div>


    </li>

    </ul>
    @endforeach


    </li>
    @empty
    <h3 class="h2">Este Post ainda não tem comentários </h3>
    @endforelse

    <!-- end comment level 1 -->


    </ol>
    <!-- END commentlist -->

</div> <!-- end comments -->



</main>

</div>




@section('js')
<script>
    var divsToHide = document.getElementsByClassName("replyForm"); //divsToHide is an array
    for(var i = 0; i < divsToHide.length; i++){
        // divsToHide[i].style.visibility = "hidden"; // or
        divsToHide[i].style.display = "none"; // depending on what you're doing
    }

    function toggleReplyComment(id) {
  var x =document.getElementById('replyComment-'+id);

  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>
<script src="https://cdn.jsdelivr.net/npm/vue"></script>
<script type='text/javascript' src='http://code.jquery.com/jquery-1.11.0.min.js'></script>
<script type="text/javascript">
    $(document).ready( function() {$( '.sidebar' ).fixedsticky();  });
</script>
<script src="https://cdn.rawgit.com/filamentgroup/fixed-sticky/master/fixedsticky.css"></script>
<script src="https://cdn.rawgit.com/filamentgroup/fixed-sticky/master/fixedsticky.js"></script>
@endsection

<script src="{{asset('js/app.js')}}"></script>
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
