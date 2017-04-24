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
                    <div class="col-md-9">
                        <h2>Articles <small>» Listing</small></h2>
                    </div>
                    <div class="col-md-3">
                        <a class="btn btn-success pull-right" href="{{ url('admin/article/create') }}"><i class="fa fa-plus-circle"></i> New Article</a>
                    </div>
                </div>
                @foreach($articles->items() as $article)
                <div class="well well-lg">
                    <h1>{{ $article->title }}</h1>
                    <h4>{{ $article->description }}</h4>
                    <h5 class="text-primary"><i class="fa fa-file"></i> 分类:{{ $article->category->name }}</h5>
                    <div class="row">
                    <button class="btn btn-link btn-xs"><i class="fa fa-eye"></i> 100</button>
                    <button class="btn btn-link btn-xs"><i class="fa fa-thumbs-o-up"></i> 100</button>
                    <button class="btn btn-info btn-xs"><i class="fa fa-tag"></i> lavarel</button>
                    <button class="btn btn-info btn-xs"><i class="fa fa-tag"></i> php</button>
                    <a class="btn btn-primary pull-right" href="{{ url("admin/article/".$article->id."/edit") }}">Read more >></a>
                    </div>
                </div>
                @endforeach
                <div class="text-center">{{ $articles->links() }}</div>
            </div>
        </div>
    </div>
@endsection