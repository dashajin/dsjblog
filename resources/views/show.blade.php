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
                @if (session('success'))
                    <div class="alert alert-info">
                        <ul>
                            <li>{{ session('success') }}</li>
                        </ul>
                    </div>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading"><p>Comments</p></div>
                    <div class="panel-body">
                        @if($article->comments->count()>0)
                            @foreach($article->comments as $comment)
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        {{ $comment->user->name }} at {{ $comment->created_at->toDateTimeString() }}
                                    </div>
                                    <div class="panel-body">
                                        {!! $comment->content !!}
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center" style="height: 50px">
                                <h4>暂时没有评论哦~</h4>
                            </div>
                        @endif
                        <hr>
                        @if(Auth::guest())
                                <div class="col-sm-offset-5">
                                    <a class="btn btn-primary" href="{{ route('login') }}">login</a> 登陆发表评论哦～
                                </div>
                        @else
                            <form role="form" method="post" action="{{ url('/comment/store') }}">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" placeholder="支持Markdown" name="content"></textarea>
                                    <input class="hidden" value="{{ Auth::user()->id }}" name="user_id">
                                    <input class="hidden" value="{{ $article->id }}" name="article_id">
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-5">
                                        <button class="btn btn-primary" type="button" onclick="form.submit();">submit</button>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
                {{--评论区结束--}}
            </div>

            {{--右侧导航栏目--}}
            <div class="col-md-4">
                @include('layouts.rightNav')
            </div>

        </div>
    </div>

@endsection