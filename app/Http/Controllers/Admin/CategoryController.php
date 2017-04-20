<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        $categories = DB::table('categories')->paginate(5);
        return view('admin.category.categories')->withCategories($categories);
    }

    public function edit($id, Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:categories',
        ]);
        $category = Category::find($id);
        $category->name = $request['name'];
        if ($category->update()) {
            return redirect('/admin/category')->withSuccess('修改成功');
        } else {
            return redirect('/admin/category')->withSuccess('修改失败');
        }
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255|unique:categories',
        ]);
        $category = new Category;
        $category->name = $request['name'];
        if ($category->save()) {
            return redirect('admin/category')->withSuccess('添加成功');
        } else {
            return redirect('admin/category')->withErrors('添加失败');
        }
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        if ($category->delete()) {
            return redirect('/admin/category')->withSuccess('删除成功');
        } else {
            return redirect('/admin/category')->withSuccess('删除失败');
        }
    }
}
