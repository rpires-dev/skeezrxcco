<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class TenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        Date::setLocale('pt');
        $posts = Post::all()->random(3);

        return view(
            'tenis',
            [
                'posts' => $posts,


            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        Date::setLocale('pt');
        $gridPosts = Post::all()->random(3);
        $post = Post::findBySlug($slug);
        $previous = Post::previousPost($post);
        $next = Post::nextPost($post);
        $relatedPosts = Post::relatedPosts($post);
        $date = Date::parse($post->created_at)->format('d F, Y');

        return view('post.show')->with(
            compact(
                'post',
                'previous',
                'next',
                'relatedPosts',
                'date'

            )
        );
    }
}
