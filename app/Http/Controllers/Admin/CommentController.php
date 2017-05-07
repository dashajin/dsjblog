<?php

namespace App\Http\Controllers\Admin;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        $comments = Comment::orderby('created_at', 'desc')->paginate(10);
        return view('admin.comment.comments')->withComments($comments);
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);
        if ($comment->delete()) {
            return redirect('/admin/comment')->withSuccess('删除成功');
        } else {
            return redirect('/admin/comment')->withSuccess('删除失败');
        }
    }
}
