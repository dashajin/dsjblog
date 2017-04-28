<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Parsedown;

class Article extends Model
{
    public function __construct()
    {
        $this->markdownParser = new Parsedown();
    }

    public function category()
    {
        return $this->belongsTo(Category::class,'cat_id','id');
    }


    public static function getNewArticles($num)
    {
        $articles = DB::select('SELECT id, title FROM articles ORDER BY created_at DESC LIMIT 0, :num', ['num' => $num]);
        return $articles;
    }

    public function getArticleByArticleID($articleID)
    {
        return self::find($articleID);
    }

    public function  getArticleByCatID($cat_id)
    {

    }

    public function getArticles($num=5)
    {
        if (!empty(request('cat_id'))) {
            $articles = self::where('cat_id', '=', request('cat_id'))->paginate($num);
            //dd($articles);
        } else if (!empty(request('id'))) {
            $articles = self::find(request('id'));
        } else {
            $articles = self::paginate($num);
        }
        //dd($articles[1]->paginate(5));
        return $articles;
    }
}
