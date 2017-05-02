<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;
use Parsedown;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
        viewInit();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //dd(Auth::user());
        $article = new Article;
        $articles = $article->getArticles(6);
        //viewInit();
        return view('home', ['articles' => $articles]);
    }

    public function show($id)
    {
        $markdownParser = new Parsedown();
        $article = Article::find($id);
        $article->content = $markdownParser->text($article->content);
        //dd($article);
        //viewInit();
        return view('show')->withArticle($article);
    }
}
