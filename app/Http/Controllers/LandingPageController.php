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


        $posts = Post::all();
        // Hero principal
        $gridPosts = Post::featured();

        $doubleGrid = Post::doubleGrid();
        // $posts = Post::paginate(10);
        $latests = Post::latest();



        return view(
            'index',
            [
                'posts' => $posts,
                'doubleGrid' => $doubleGrid,
                'gridPosts' => $gridPosts,
                'latests' => $latests,


            ]
        );
    }
}
