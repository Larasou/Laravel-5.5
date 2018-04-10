<?php

namespace App\Http\Controllers\Posts;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentsController extends Controller
{
    public function store(Post $post) {
        $post->comments()->create(\request()->all());
         return back();
    }

    public function destroy(Post $post, Comment $comment) {
         $comment->delete();

         return back();
    }
}
