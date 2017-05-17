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
                                            href="{{ url('article',[$article->id]) }}"
                                    >
                                        <h2 class="post-title">{{ $article->title }}</h2>
                                    </a>
                                        <h5 class="post-subtitle" style="color: darkgray; overflow: hidden; text-overflow: ellipsis; white-space: nowrap; width: inherit">{{ $article->content }} </h5>
                                    <i class="fa fa-calendar-o"></i> {{ $article->created_at->toDateTimeString() }}
                                    | <i class="fa fa-folder-o"></i><a href="{{ url("/article?cat_id=".$article->category->id) }}"> {{ $article->category->name }} </a>
                                    | <i class="fa fa-comments-o"></i> {{ $article->comments->count() }}
                                    <p class="post-meta">
                                        @if($article->tags)
                                            @foreach( $article->tags as $tag)
                                                <a href="/article?tag_id={{ $tag->id }}">
                                                    <span class="label {{ request('tag_id') == $tag->id?'label-success':'label-info' }}"  style="font-size: 66%"> <i class="fa fa-tags"></i> {{ $tag->name }}</span>
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
    @include('layouts.footer')
@endsection
