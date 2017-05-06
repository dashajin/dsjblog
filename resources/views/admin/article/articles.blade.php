@extends('admin.layouts.app')
@section('content')
    @include('admin.layouts.leftnav')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Articles <small>>>> Listing</small></h1>
                    <h1 class="page-subhead-line">This is dummy text , you can replace it with your original text. </h1>
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
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th class="col-md-1">ID</th>
                                <th>title</th>
                                <th>description</th>
                                <th class="col-md-2">created_at</th>
                                <th class="col-md-2">operation</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($articles as $article)
                                <tr>
                                    <td>{{ $article->id }}</td>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ $article->description }}</td>
                                    <td>{{ $article->created_at->toDateTimeString() }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" href="{{ url("admin/article/".$article->id."/edit") }}">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ url('admin/article/'.$article->id) }}" method="POST" style="display: inline;">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="button" class="btn btn-danger btn-sm" onclick="form.submit();"><i class="fa fa-trash"></i> DELETE</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="text-center">{{ $articles->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection
