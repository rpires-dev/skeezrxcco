<?php

namespace App\Http\Controllers;

use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class LandingPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Date::setLocale('pt');

        $gridPosts = Post::all()->random(3);
        $slidePosts = Post::orderBy('created_at', 'desc')->limit(3)->get();
        // $posts = Post::paginate(10);
        $posts = Post::all();
        $post = Post::all()->random(3);



        return view(
            'index',
            [
                'posts' => $posts,
                'slidePosts' => $slidePosts,
                'gridPosts' => $gridPosts,


            ]
        );
    }
}
