@extends('admin.layouts.app')

@section('content')
    @include('admin.layouts.leftnav')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Articles <small>>>> Edit</small></h1>
                    <h1 class="page-subhead-line text-center" style="font-size: 40px;">{{ config('app.admin.motto') }}</h1>
                </div>
            </div>
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
            <div class="row">
                <div class="col-md-12">
                    <form role="form" method="post" action="{{ url('/admin/article', ['id' => $article->id]) }}">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" value="{{ $article->title }}" id="title" name="title">
                            <label for="desc">Description:</label>
                            <textarea class="form-control" rows="3" id="desc" name="description">{{ $article->description }}</textarea>
                            <label for="content">Content:</label>
                            <textarea class="form-control" rows="10" id="content" name="content">{{ $article->content }}</textarea>
                            <label for="name">category:</label>
                            <select id='sel' class="form-control" name="cat_id">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" @if($article->category->id == $category->id) selected="selected" @endif>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                            <label for="tag">Tag:</label>
                            <select class="js-example-basic-multiple-limit form-control" multiple="multiple" name="tag_id[]">
                                @foreach($allTags as $tag)
                                    <option value="{{ $tag->id }}"
                                    @foreach($article->tags as $articleTag)
                                        @if($articleTag->id == $tag->id)
                                            selected="selected"
                                        @endif
                                    @endforeach
                                        >{{ $tag->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-5">
                                <button class="btn btn-primary" type="button" onclick="form.submit();">修改</button>
                                <a href="{{ url()->previous() }}" class="btn btn-danger">返回</a>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
        </div>
    </div>
@endsection

@section('js')
    {{--<script  type = "text/javascript" >--}}
    {{--document.getElementById("sel")[0].selected=true;--}}
    {{--</script >--}}
    <script src="/select2/dist/js/select2.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".js-example-basic-multiple-limit").select2({
                maximumSelectionLength: 5
            });
        });
    </script>
    @endsection