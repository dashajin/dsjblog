@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.layouts.leftnav')
            <div class="col-md-9">
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
                    <div class="row page-title-row">
                        <div class="col-md-12">
                            <h2>Articles <small>» edit</small></h2>
                        </div>
                    </div>
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
@endsection

@section('js')
    {{--<script  type = "text/javascript" >--}}
    {{--document.getElementById("sel")[0].selected=true;--}}
    {{--</script >--}}
    @endsection