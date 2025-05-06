<?php

namespace App\Http\Controllers;



use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\Categories;

class CategoriesController extends Controller
{
    public function index(): Factory|Application|View
    {
        //从数据库中获取 categories 表的所有数据，并保存到 $categories 变量中，返回的是一个 Collection 对象。
        //返回结果类型是 Illuminate\Database\Eloquent\Collection，可以用 foreach 来遍历。
//        $categories = Categories::all();
        //把 $categories 数据传给 Blade 模板 resources/views/categories/index.blade.php 并渲染出来。
//        return view ('categories.index', ['categories' => $categories]);
        //分页。Categories::Eloquent ORM（对象关系映射）语法，本质上会生成数据库查询语句
        $categories = Categories::paginate(10);//等价于SELECT * FROM categories LIMIT 10 OFFSET 0;
        return view('categories.index', compact('categories'));
    }

    public function create(): View|Application|Factory
    {
        return view('categories.create');
    }

    public function store(Request $request)//保存
    {
        logger('Index controller executed');
        return redirect()->route('categories.index')
            ->with('error', '✅ 成功添加分类！');

    }

    public function show(Categories $categories)
    {

    }

    public function edit(Categories $category): View|Application|Factory
    {
        return view('categories.edit', compact('category'));
    }

    public  function  update(Request $request, Categories $categories): RedirectResponse
    {
        return redirect()->route('categories.index')
            ->with('info', '✅ 成功添加分类！');
    }

    public function  destory(Categories $categories)
    {

    }


}
