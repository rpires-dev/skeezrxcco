<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class BlogController extends Controller
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
            'blog',
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
        $posts = Post::Recomendado($post);
        $date = Date::parse($post->created_at)->format('d F, Y');

        return view('post.show')->with(
            compact(
                'post',
                'posts',
                'previous',
                'next',
                'relatedPosts',
                'date'

            )
        );
    }
}
