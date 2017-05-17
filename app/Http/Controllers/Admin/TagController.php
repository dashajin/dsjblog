<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use App\Http\Controllers\Controller;
use App\Tag;
use Illuminate\Support\Facades\DB;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        $tags = Tag::orderby('created_at', 'desc')->paginate(10);
        return view('admin.tag.tags')->withTags($tags);
    }

    public function store(TagRequest $request)
    {
        //dd($request->all());
        if (Tag::create($request->all())) {
            return redirect('admin/tag')->withSuccess('添加成功');
        } else {
            return redirect('admin/tag')->withErrors('添加失败');
        }
    }

    public function edit($id, TagRequest $request)
    {
        $tag = Tag::find($id);
        if ($tag->update($request->all())) {
            return redirect('/admin/tag')->withSuccess('修改成功');
        } else {
            return redirect('/admin/tag')->withSuccess('修改失败');
        }
    }

    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->articles()->detach();
        if ($tag->delete()) {
            return redirect('/admin/tag')->withSuccess('删除成功');
        } else {
            return redirect('/admin/tag')->withSuccess('删除失败');
        }
    }
}
