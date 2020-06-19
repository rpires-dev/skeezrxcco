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

    public static function findByCat_id($category_id)
    {
        return static::where('category_id', $category_id)->get();
    }

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
}
