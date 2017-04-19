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
                <h2>添加文章</h2>
                <form role="form" method="post" action="{{ url('/admin/article/store') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" placeholder="文章标题" id="title" name="title">
                        <label for="desc">Description:</label>
                        <textarea class="form-control" rows="3" placeholder="文章描述" id="desc" name="description"></textarea>
                        <label for="content">Content:</label>
                        <textarea class="form-control" rows="10" placeholder="文章内容" id="content" name="content"></textarea>
                        <label for="name">category:</label>
                        <select class="form-control" name="category">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-5">
                            <button class="btn btn-primary" type="button" onclick="form.submit();">submit</button>
                            <a href="{{ url()->previous() }}" class="btn btn-danger">返回</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection