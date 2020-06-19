@extends('layouts.index')
@section('page_title', '| '.$post->title)
@section('container')

<section class="site-section py-lg">
    <div class="s-content content">
        <main class="row content__page">

            <article class="column large-full entry format-standard">

                <div class="media-wrap entry__media">
                    <div class="entry__post-thumb">
                        <img src="/storage/{{ $post->image }}" sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                    </div>
                </div>

                <div class="content__page-header entry__header">
                    <h1 class="display-1 entry__title">
                        {{$post->title}}
                    </h1>
                    <ul class="entry__header-meta">
                        <li class="author">Por <a href="#0">{{$post->author->name}}</a></li>
                        <li class="date">
                            {{   Date::parse($post->created_at)->format('d F, Y')}}

                        </li>
                        <li class="cat-links">
                            <a href="#"> {{$post->category->name}}</a>

                        </li>
                    </ul>
                </div> <!-- end entry__header -->

                <div class="entry__content">

                    <p class="lead drop-cap">
                        {{$post->excerpt}}
                    </p>

                    <p>
                        {{strip_tags($post->body)}}
                    </p>





                    <p class="entry__tags">
                        <span>Tags deste Artigo </span>

                        <span class="entry__tag-list">
                            @foreach($post->tags as $tag)

                            <a href="#">{{$tag->name}}</a>
                            @endforeach

                        </span>

                    </p>
                </div> <!-- end entry content -->

                <div class="entry__pagenav">
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
                </div> <!-- end entry__pagenav -->
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
                </div> <!-- end entry related -->



            </article> <!-- end column large-full entry-->


            <div class="comments-wrap">

                <div id="comments" class="column large-12">

                    <h3 class="h2">5 Comments</h3>

                    <!-- START commentlist -->
                    <ol class="commentlist">

                        <li class="depth-1 comment">

                            <div class="comment__avatar">
                                <img class="avatar" src="images/avatars/user-01.jpg" alt="" width="50" height="50">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                    <div class="comment__author">Itachi Uchiha</div>

                                    <div class="comment__meta">
                                        <div class="comment__time">April 30, 2019</div>
                                        <div class="comment__reply">
                                            <a class="comment-reply-link" href="#0">Reply</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment__text">
                                    <p>Adhuc quaerendum est ne, vis ut harum tantas noluisse, id suas iisque mei. Nec te
                                        inani ponderum vulputate,
                                        facilisi expetenda has et. Iudico dictas scriptorem an vim, ei alia mentitum
                                        est, ne has voluptua praesent.</p>
                                </div>

                            </div>

                        </li> <!-- end comment level 1 -->

                        <li class="thread-alt depth-1 comment">

                            <div class="comment__avatar">
                                <img class="avatar" src="images/avatars/user-04.jpg" alt="" width="50" height="50">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                    <div class="comment__author">John Doe</div>

                                    <div class="comment__meta">
                                        <div class="comment__time">April 30, 2019</div>
                                        <div class="comment__reply">
                                            <a class="comment-reply-link" href="#0">Reply</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment__text">
                                    <p>Sumo euismod dissentiunt ne sit, ad eos iudico qualisque adversarium, tota falli
                                        et mei. Esse euismod
                                        urbanitas ut sed, et duo scaevola pericula splendide. Primis veritus
                                        contentiones nec ad, nec et
                                        tantas semper delicatissimi.</p>
                                </div>

                            </div>

                            <ul class="children">

                                <li class="depth-2 comment">

                                    <div class="comment__avatar">
                                        <img class="avatar" src="images/avatars/user-03.jpg" alt="" width="50"
                                            height="50">
                                    </div>

                                    <div class="comment__content">

                                        <div class="comment__info">
                                            <div class="comment__author">Kakashi Hatake</div>

                                            <div class="comment__meta">
                                                <div class="comment__time">April 29, 2019</div>
                                                <div class="comment__reply">
                                                    <a class="comment-reply-link" href="#0">Reply</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="comment__text">
                                            <p>Duis sed odio sit amet nibh vulputate
                                                cursus a sit amet mauris. Morbi accumsan ipsum velit. Duis sed odio sit
                                                amet nibh vulputate
                                                cursus a sit amet mauris</p>
                                        </div>

                                    </div>

                                    <ul class="children">

                                        <li class="depth-3 comment">

                                            <div class="comment__avatar">
                                                <img class="avatar" src="images/avatars/user-04.jpg" alt="" width="50"
                                                    height="50">
                                            </div>

                                            <div class="comment__content">

                                                <div class="comment__info">
                                                    <div class="comment__author">John Doe</div>

                                                    <div class="comment__meta">
                                                        <div class="comment__time">April 29, 2019</div>
                                                        <div class="comment__reply">
                                                            <a class="comment-reply-link" href="#0">Reply</a>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="comment__text">
                                                    <p>Investigationes demonstraverunt lectores legere me lius quod ii
                                                        legunt saepius. Claritas est
                                                        etiam processus dynamicus, qui sequitur mutationem consuetudium
                                                        lectorum.</p>
                                                </div>

                                            </div>

                                        </li>

                                    </ul>

                                </li>

                            </ul>

                        </li> <!-- end comment level 1 -->

                        <li class="depth-1 comment">

                            <div class="comment__avatar">
                                <img class="avatar" src="images/avatars/user-02.jpg" alt="" width="50" height="50">
                            </div>

                            <div class="comment__content">

                                <div class="comment__info">
                                    <div class="comment__author">Shikamaru Nara</div>

                                    <div class="comment__meta">
                                        <div class="comment__time">April 26, 2019</div>
                                        <div class="comment__reply">
                                            <a class="comment-reply-link" href="#0">Reply</a>
                                        </div>
                                    </div>
                                </div>

                                <div class="comment__text">
                                    <p>Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum
                                        claritatem.</p>
                                </div>

                            </div>

                        </li> <!-- end comment level 1 -->

                    </ol>
                    <!-- END commentlist -->

                </div> <!-- end comments -->

                <div class="column large-12 comment-respond">

                    <!-- START respond -->
                    <div id="respond">

                        <h3 class="h2">Add Comment <span>Your email address will not be published</span></h3>

                        <form name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
                            <fieldset>

                                <div class="form-field">
                                    <input name="cName" id="cName" class="full-width" placeholder="Your Name" value=""
                                        type="text">
                                </div>

                                <div class="form-field">
                                    <input name="cEmail" id="cEmail" class="full-width" placeholder="Your Email"
                                        value="" type="text">
                                </div>

                                <div class="form-field">
                                    <input name="cWebsite" id="cWebsite" class="full-width" placeholder="Website"
                                        value="" type="text">
                                </div>

                                <div class="message form-field">
                                    <textarea name="cMessage" id="cMessage" class="full-width"
                                        placeholder="Your Message"></textarea>
                                </div>

                                <input name="submit" id="submit" class="btn btn--primary btn-wide btn--large full-width"
                                    value="Add Comment" type="submit">

                            </fieldset>
                        </form> <!-- end form -->

                    </div>
                    <!-- END respond-->
                    @comments(['model'=> $post])
                </div> <!-- end comment-respond -->

            </div> <!-- end comments-wrap -->
        </main>

    </div>
</section>

@stop

{{--
 {{strip_tags($post->body)}}
@comments(['model'=> $post])
{{$post->created_at->format('F d, Y')}}
{{$post->title}}
{{$post->category->name}}
/storage/{{ $post->image }}
{{$post->excerpt}}
--}}
