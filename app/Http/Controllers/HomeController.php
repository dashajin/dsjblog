<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = new Article;
        $articles = $article->getArticles(5);
        viewInit();
        return view('home', ['articles' => $articles]);
    }

    public function show($id)
    {
        $article = Article::find($id);
        //dd($article);
        viewInit();
        return view('show')->withArticle($article);
    }
}
