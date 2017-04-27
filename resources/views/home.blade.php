@extends('layouts.app')

@section('content')
    {{--页面主体--}}
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-body">
                        @if($articles->count()>0)
                            @foreach($articles as $k => $article)
                                <div class="post-preview">
                                    <a
                                            href="{{ url('article',[$article->seo_title]) }}@if(request('cat_id'))?cat_id={{request('cat_id')}}@endif @if(request('key_id'))?key_id={{request('key_id')}}@endif"
                                    >
                                        <h1 class="post-title">{{ $article->title }}</h1>
                                        <h3 class="post-subtitle">{{ $article->description }}</h3>
                                    </a>
                                    分类:<a>{{ $article->category->name }}</a>
                                    <p class="post-meta">
                                        dashajin on {{ $article->created_at->toDateString() }}
                                        in
                                        @if($article->keys)
                                            @foreach( $article->keys as $key)
                                                <a href="/article?key_id={{ $key->id }}">
                                                    <span class="label {{ request('key_id') == $key->id?'label-success':'label-info' }}"  style="font-size: 66%"> <i class="glyphicon glyphicon-tag"></i>&nbsp; &nbsp;{{ $key->name }}</span>
                                                </a>
                                                {{--<a href="/blog?tag=rem">{{ $key->name }}</a>--}}
                                            @endforeach
                                        @endif
                                    </p>
                                </div>
                                <hr>
                            @endforeach
                        @else
                            <div class="text-center" style="height: 500px">
                                <h1>暂时没有文章哦~</h1>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="text-center">{{ $articles->links() }}</div>
            </div>
            <div class="col-md-4">
                @include('layouts.rightNav')
            </div>

        </div>
    </div>
@endsection
