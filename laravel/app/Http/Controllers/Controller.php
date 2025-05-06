<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

abstract class Controller
{
    //
    public  function index(): View|Application|Factory
    {   //这个是 Laravel 的一个 全局辅助函数，它用来加载 视图文件，返回一个 视图实例对象。
        return view('tests.index');
    }

    public ?int $perPage = null;

    public function __construct()
    {
        $this->perPage = config('app.per_page', 5);
    }
}
