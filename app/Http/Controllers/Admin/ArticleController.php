<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\ArticleRequest;
use App\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Article;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        $article = new Article;
        $articles = $article->paginate(10);
        return view('admin.article.articles', compact('articles'))->withCategories(Category::all());
    }

    public function create()
    {
//        $img = Image::canvas(800, 600, '#8eb4cb');
//        $img->save(public_path('images/test1.jpg'));
//        $path = public_path('images/test1.jpg');
//        echo "<img src='/images/test1.jpg'>";
        $tags = Tag::all();
        return view('admin.article.create', compact('tags'))->withCategories(Category::all());
    }

    public function store(ArticleRequest $request)
    {
        $article = new Article;
//        $article->title = $request['title'];
//        $article->description = $request['description'];
//        $article->content = $request['content'];
//        $article->cat_id = $request['cat_id'];
        $res = $article->create($request->all());
        $res->tags()->attach($request->get('tag_id'));
        if ($res) {
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

    public function update(ArticleRequest $request, $id)
    {
        $article = Article::find($id);
//        $article->title = $request['title'];
//        $article->description = $request['description'];
//        $article->content = $request['content'];
//        $article->cat_id = $request['cat_id'];
        $res = $article->update($request->all());
        if ($res)
        {
            return redirect('/admin/article')->withSuccess('文章更新成功');
        }
    }

    public function destroy($id)
    {
        $article = Article::find($id);
        $article->tags()->detach();
        if ($article->delete()) {
            return redirect('/admin/article')->withSuccess('删除成功');
        } else {
            return redirect('/admin/article')->withSuccess('删除失败');
        }
    }
}
