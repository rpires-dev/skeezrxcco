<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Jenssegers\Date\Date;

class CategoriesController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        Date::setLocale('pt');

        $post = Category::findByCatSlug($slug);
        $posts = Post::findByCat_id($post);


        return view('category.show')->with(
            compact(
                'posts',


            )
        );
    }
}
