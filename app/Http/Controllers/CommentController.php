<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentRequest;
use Illuminate\Http\Request;
use Parsedown;

class CommentController extends Controller
{
    public function store(CommentRequest $request)
    {
        $comment = new Comment;
        $markdownParser = new Parsedown();
        $comment->user_id = $request['user_id'];
        $comment->article_id = $request['article_id'];
        $comment->content = $markdownParser->text($request['content']);
        if ($comment->save()) {
            return back()->withSuccess('评论成功');
        } else {
            return back()->withSuccess('评论失败');
        }
    }
}
