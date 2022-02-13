<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Services\ModelLogger;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CommentController
{
    public function send($articleId, Request $request, ModelLogger $logger): RedirectResponse
    {
        // Implement request validation

        $comment = new Comment();
        $comment->article_id = $articleId;
        $comment->author_email = $request['formCommentEmail'];
        $comment->message = $request['formCommentComment'];
        $comment->save();

        $logger->logModel($request->user(), $comment);

        return redirect()->back();
    }
}
