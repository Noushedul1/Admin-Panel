<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    public function store(Request $request,$post_id) {
        // return $request->all();
        $comment = new Comment();
        $comment->post_id = $post_id;
        $comment->user_id = 1;
        $comment->message = $request->message;
        $comment->save();
        return redirect('/');
    }
}
