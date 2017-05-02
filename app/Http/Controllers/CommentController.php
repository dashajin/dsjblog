<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use Parsedown;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required',
            'user_id' => 'required',
            'article_id' => 'required',
        ]);
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
