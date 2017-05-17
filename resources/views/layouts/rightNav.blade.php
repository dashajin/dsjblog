<div class="panel panel-default" style="overflow: hidden">
    <div class="panel-heading" style="height: 150px; background-image: url('/images/test1.jpg')">
        <div class="text-center" style="margin-top: 80px"><img src="{{ url('/images/avatar.jpg') }}" class="img-circle" style="height: 90px; width: 90px"></div>
    </div>

    <div class="panel-body">
        <div class="row" style="margin-top: 40px">
            <div class="col-lg-4 text-center"><a href="https://github.com/dashajin"><i class="fa fa-github" style="font-size: larger"></i></a></div>
            <div class="col-lg-4 text-center"><i class="fa fa-weibo" style="font-size: larger"></i></div>
            <div class="col-lg-4 text-center"><i class="fa fa-weixin" style="font-size: larger"></i></div>
        </div>
    </div>
</div>
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
            <ul class="list-group">
                @foreach( $categories as $category)
                <a class="list-group-item" href="{{ url("/article?cat_id=$category->id") }}">{{ $category->name }} <span class="text-right badge">{{ $category->articles->count() }}</span></a>
                @endforeach
            </ul>
        @else
            <h4>暂时没有分类哦~</h4>
        @endif
    </div>
</div>
<div class="panel panel-default">
    <div class="panel-heading">标签云</div>
    <div class="panel-body">
        @if($allTags->count() > 0)
            @foreach( $allTags as $tag)
                {{--<a class="list-group-item" href="{{ url("/article?tag_id=$tag->id") }}">{{ $tag->name }} <span class="text-right badge">{{ $tag->articles->count() }}</span></a>--}}
                <a href="/article?tag_id={{ $tag->id }}">
                    <span class="label {{ request('tag_id') == $tag->id?'label-success':'label-info' }}"  style="font-size: 66%"> <i class="fa fa-tags"></i> {{ $tag->name }}</span>
                    <span class="text-right badge">{{ $tag->articles->count() }}</span>
                </a>
            @endforeach
        @else
            <h4>暂时没有标签哦~</h4>
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
