<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index(): \Illuminate\Contracts\View\Factory|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\View
    {
        //从数据库中获取 categories 表的所有数据，并保存到 $categories 变量中，返回的是一个 Collection 对象。
        //返回结果类型是 Illuminate\Database\Eloquent\Collection，可以用 foreach 来遍历。
        $categories = Categories::all();
        //把 $categories 数据传给 Blade 模板 resources/views/categories/index.blade.php 并渲染出来。
        return view ('categories.index', ['categories' => $categories]);
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(Categories $categories)
    {

    }

    public function edit(Categories $categories)
    {

    }

    public  function  update(Request $request, Categories $categories)
    {

    }

    public function  destory(Categories $categories)
    {

    }


}
