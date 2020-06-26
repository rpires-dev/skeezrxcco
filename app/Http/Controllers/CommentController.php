<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }




    public function store(Post $post)
    {
        request()->validate([
            'content' => 'required|min:3'
        ]);


        $comment = new Comment();
        $comment->content = request('content');
        $comment->user_id = auth()->user()->id;

        $post->comments()->save($comment);

        return redirect()->back();
    }


    public function storeCommentReply(Comment $comment)
    {
        request()->validate([
            'replyComment' => 'required|min:3'
        ]);

        $commentReply = new Comment();
        $commentReply->content = request('replyComment');
        $commentReply->user_id = auth()->user()->id;

        $comment->comments()->save($commentReply);

        return redirect()->back();
    }
}
