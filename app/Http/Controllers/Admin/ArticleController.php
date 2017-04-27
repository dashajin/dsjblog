<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        $article = new Article;
        $articles = $article->paginate(2);
        return view('admin.article.articles', compact('articles'))->withCategories(Category::all());
    }

    public function create()
    {
        return view('admin.article.create')->withCategories(Category::all());
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
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

    public function edit($id)
    {
        $article = Article::find($id);
        return view('admin.article.operate', compact('article'))->withCategories(Category::all());
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'description' => 'required',
            'content' => 'required',
        ]);
        $article = Article::find($id);
        $article->title = $request['title'];
        $article->description = $request['description'];
        $article->content = $request['content'];
        $article->cat_id = $request['category'];
        $res = $article->update();
        if ($res)
        {
            return redirect('/admin/article')->withSuccess('文章更新成功');
        }
    }

    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect('/admin/article')->withSuccess('文章删除成功');
    }
}
