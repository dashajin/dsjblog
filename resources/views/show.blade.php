@extends('layouts.app')

@section('content')
    {{--页面主体--}}
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <article>
                            <div class="title text-center">
                                <h1>{{ $article->title }}</h1>
                            </div>
                            <hr>
                            <div class="meta">
                                <span>分类:</span>
                                    <a href="{{ url('/article?cat_id='.$article->cat_id) }}">{{ $article->category->name }}</a>
                                <span class="pull-right">
                                        {{ $article->created_at}}
                                    </span>
                            </div>
                            <br>
                            <div class="content">
                                {!! $article->content !!}
                            </div>
                        </article>
                        {{--<ul class="pager">--}}
                            {{--@if($previous)--}}
                                {{--<li class="previous">--}}
                                    {{--<a href="/article/{{ $previous->seo_title }}@if(request('cat_id'))?cat_id={{request('cat_id')}}@endif @if(request('key_id'))?key_id={{request('key_id')}}@endif">--}}
                                        {{--<i class="glyphicon glyphicon-arrow-left"></i>--}}
                                        {{--<span>上一篇</span>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--@endif--}}

                            {{--@if($next)--}}
                                {{--<li class="next">--}}
                                    {{--<a--}}
                                            {{--href="/article/{{ $next->seo_title }}@if(request('cat_id'))?cat_id={{request('cat_id')}}@endif @if(request('key_id'))?key_id={{request('key_id')}}@endif"--}}
                                    {{-->--}}
                                        {{--<span>下一篇</span>--}}
                                        {{--<i class="glyphicon glyphicon-arrow-right"></i>--}}
                                    {{--</a>--}}
                                {{--</li>--}}
                            {{--@endif--}}
                        {{--</ul>--}}
                    </div>
                </div>
                {{--评论区开始--}}
                {{--<article-comment article_id="{{ $article->id }}" ></article-comment>--}}
                {{--评论区结束--}}
            </div>

            {{--右侧导航栏目--}}
            <div class="col-md-4">
                @include('layouts.rightNav')
            </div>

        </div>
    </div>

@endsection