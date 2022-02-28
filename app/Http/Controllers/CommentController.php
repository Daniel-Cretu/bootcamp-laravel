<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController
{
    public function add($articleId, Request $request): RedirectResponse
    {

        $comment = new Comment();
        $comment->article_id = $articleId;
        $comment->author_email = $request['formCommentEmail'];
        $comment->message = $request['formCommentComment'];
        $comment->save();

        return redirect()->back();
    }
}
