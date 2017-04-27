<div class="panel panel-default">
    <div class="panel-heading">搜索</div>
    <div class="panel-body">
        <form action="/article" method="get">
            <div class="col-md-8">
                <input type="text" class=" form-control" name="search" value="{{ request('search') }}" placeholder="">
            </div>
            <div class="col-md-4">
                <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> 搜索</button>
            </div>
        </form>
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">分类</div>
    <div class="panel-body">
        @if($categories->count() > 0)
            @foreach( $categories as $category)
                <a href="{{ url("/article?cat_id=$category->id") }}"
                   style="font-size: {{ mt_rand(20,30) }}px;color:rgb({{ mt_rand(0,255) }}, {{ mt_rand(0,255) }}, {{ mt_rand(0,255) }});"
                >{{ $category->name }}</a>
                {{--<a href="/blog?tag=rem">{{ $key->name }}</a>--}}
            @endforeach
        @else
            <h4>暂时没有关键字哦~</h4>
        @endif
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">最新文章</div>
    <div class="panel-body">
        <ul class="list-unstyled">
            @if(!empty($newArticleList))
                @foreach($newArticleList as $article)
                    <h4><li style="margin-top: 20px"><a href="{{ url("/article", ['id' => $article->id])}}">{{ $article->title }}</a></li></h4>
                @endforeach
            @else
                <h4>暂时没有文章哦~~</h4>
            @endif
        </ul>
    </div>
</div>