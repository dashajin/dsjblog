<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Article extends Model
{

    protected $fillable = [
        'title', 'description', 'content', 'cat_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'article_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
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
        } else if (!empty(request('tag_id'))) {
            $articles = Tag::find(request('tag_id'))->articles()->paginate($num);
        } else if (!empty(request('id'))) {
            $articles = self::find(request('id'));
        } else if (!empty(request('search'))) {
            $search = request('search');
            $articles = self::where('title','like',"%$search%")
                ->orWhere('description','like',"%$search%")
                ->paginate($num);
        } else {
            //dd(self::paginate(5));
            $articles = self::orderby('created_at', 'desc')->paginate($num);
        }
        //dd($articles[1]->paginate(5));
        return $articles;
    }
}
