<?php
/**
 * Created by PhpStorm.
 * User: yangjin
 * Date: 17/4/26
 * Time: 下午5:58
 */
if (!function_exists('viewInit')) {
    /**
     * 字符串截取
     * @param string $string
     * @param integer $length
     * @param string $suffix
     * @return string
     */
    function viewInit()
    {
        $article = app('App\Article');
        $category = app('App\Category');
        $tag = app('App\Tag');
        $view = app('view');

        $view->share('newArticleList', $article::getNewArticles(5));
        $view->share('categories', $category::all());
        $view->share('allTags', $tag::all());
    }
}