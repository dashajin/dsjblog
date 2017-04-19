<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        return view('admin.article.articles')->withArticles(Article::all());
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|unique:articles|max:255',
            'description' => 'required',
            'content' => 'required',
        ]);
        $article = new Article;
        $article->title = $request['title'];
        $article->description = $request['description'];
        $article->content = $request['content'];
        $article->cat_id = $request['category'];
        if ($article->save()) {
            return redirect('admin/article/create')->withSuccess('添加成功');
        } else {
            return redirect('admin/article/create')->withErrors('添加失败');
        }
    }
}
