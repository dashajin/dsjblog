<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ArticleController extends Controller
{
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
        $articles = $article->getAticles(5);
        viewInit();
        return view('home', ['articles' => $articles]);
    }
}
