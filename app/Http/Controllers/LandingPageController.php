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


        $posts = Post::lastPosts();
        // Hero principal
        $gridPosts = Post::featured();

        $doubleGrid = Post::doubleGrid();

        $latests = Post::latest();

        $featuredSingle = Post::featuredSingle();

        $moreMusic = Post::moreMusic();
        $moreTenis = Post::moreTenis();
        $moreNovidades = Post::moreNovidades();
        $moreHacktivismo = Post::moreHacktivismo();


        return view(
            'index',
            [
                'posts' => $posts,
                'doubleGrid' => $doubleGrid,
                'gridPosts' => $gridPosts,
                'latests' => $latests,
                'featuredSingle' => $featuredSingle,
                'moreMusic' => $moreMusic,
                'moreTenis' => $moreTenis,
                'moreNovidades' => $moreNovidades,
                'moreHacktivismo' => $moreHacktivismo,


            ]
        );
    }
}
