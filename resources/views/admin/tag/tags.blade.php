@extends('admin.layouts.app')

@section('content')
    @include('admin.layouts.leftnav')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Tags <small>>>> Listing</small>
                        <button class="btn btn-success pull-right" data-toggle="modal" data-target="#create"><i class="fa fa-plus-circle"></i> New Tag</button>
                        <!-- 模态框（Modal） -->
                        <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <form role="form" method="post" action="{{ url('/admin/tag/store') }}">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="myModalLabel">添加Tag</h4>
                                            </div>
                                            <div class="modal-body">
                                                <input type="text" class="form-control" placeholder="请输入标签名" name="name">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info btn-xs" data-dismiss="modal">关闭</button>
                                                <button type="submit" class="btn btn-danger btn-xs">确定</button>
                                            </div>
                                        </div>
                                    </form>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal -->
                        </div>
                    </h1>
                    <h1 class="page-subhead-line text-center" style="font-size: 40px;">{{ config('app.admin.motto') }}</h1>
                </div>
            </div>
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if (session('success'))
                <div class="alert alert-info">
                    <ul>
                        <li>{{ session('success') }}</li>
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <table id="tags-table" class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tag name</th>
                            <th>Articles</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($tags as $tag)
                            <tr>
                                <td>{{ $tag->id }}</td>
                                <td>{{ $tag->name }}</td>
                                <td>{{ $tag->articles->count() }}</td>
                                <td>
                                    <button class="btn btn-primary btn-xs" data-toggle="modal" data-target="#{{ $tag->id }}"><i class="fa fa-edit"></i>Edit</button>
                                    <!-- 模态框（Modal） -->
                                    <div class="modal fade" id="{{ $tag->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form role="form" method="get" action="{{ url('/admin/tag/edit', ['id' => $tag->id]) }}">
                                                    <div class="form-group">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                            <h4 class="modal-title" id="myModalLabel">修改Tag</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <label for="id">Category ID: {{ $tag->id }}</label>
                                                            <input type="text" class="form-control" value="{{ $tag->name }}" name="name">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-info btn-xs" data-dismiss="modal">关闭</button>
                                                            <button type="submit" class="btn btn-danger btn-xs">确定</button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div><!-- /.modal-content -->
                                        </div><!-- /.modal -->
                                    </div>
                                    <a href="{{ url('/admin/tag/delete', ['id' => $tag->id]) }}" class="btn btn-xs btn-danger">
                                        <i class="fa fa-trash"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="text-center">{{ $tags->links() }}</div>
                </div>
            </div>
        </div>
    </div>
@endsection