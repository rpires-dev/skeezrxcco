<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Laravelista\Comments\Commentable;


class Post extends Model
{
    use Commentable;




    // Relationships

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Tag', 'post_tag', 'post_id', 'tag_id');
    }


    // Query Functions
    public static function findBySlug($slug)
    {
        return static::where('slug', $slug)->firstOrFail();
    }

    // SEARCH FUNCTIONS
    public static function findByCat_id($category_id)
    {
        return static::where('category_id', $category_id)->get();
    }
    // SINGLE POST FUNCTIONS
    public static function previousPost($post)
    {
        return static::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
    }
    public static function nextPost($post)
    {
        return static::where('id', '>', $post->id)->orderBy('id')->first();
    }
    public static function relatedPosts($post)
    {
        return static::where([
            ['category_id', '=', $post->id],
            ['id', '!=', $post->id],
        ])->limit(3)->get();
    }



    // LANDING PAGE FUNCTIONS
    public static function featured()
    {
        return static::where('featured', 1)->orderBy('id', 'desc')->take(3)->get();
    }
    public static function doubleGrid()
    {
        return static::where('featured', 1)->orderBy('id', 'desc')->skip(3)->take(2)->get();
    }
    public static function latest()
    {
        return static::where('featured', 0)->orderBy('id', 'desc')->take(7)->get();
    }
    public static function featuredSingle()
    {
        return static::where('featured', 1)->orderBy('id', 'desc')->skip(5)->take(1)->get();
    }

    public static function lastPosts()
    {
        return static::orderBy('id', 'desc')->skip(7)->take(20)->get();
    }


    public static function moreMusic()
    {
        return static::where('postType_id', 1)->orderBy('id', 'desc')->take(3)->get();
    }

    public static function moreTenis()
    {
        return static::where('postType_id', 2)->orderBy('id', 'desc')->take(3)->get();
    }

    public static function moreNovidades()
    {
        return static::where('postType_id', 3)->orderBy('id', 'desc')->take(3)->get();
    }

    public static function moreHacktivismo()
    {
        return static::where('postType_id', 4)->orderBy('id', 'desc')->take(3)->get();
    }


    // MUSIC PAGE FUNCTIONS



    public static function FeaturedMusic()
    {
        return static::where([
            ['postType_id', 1],
            ['featured', 1],
        ])->orderBy('id', 'desc')->take(1)->get();
    }

    public static function FeaturedMusicGrid()
    {
        return static::where([
            ['postType_id', 1],
            ['featured', 1],
        ])->orderBy('id', 'desc')->skip(1)->take(4)->get();
    }
    public static function lastMusicPosts()
    {
        return static::where([
            ['postType_id', 1],
            ['featured', 0],
        ])->orderBy('id', 'desc')->get();
    }


    // TENIS PAGE FUNCTIONS
}
