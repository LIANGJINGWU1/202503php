<?php
namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use JetBrains\PhpStorm\NoReturn;
use app\Models\User;

class UserController extends Controller
{

    public function create(): View|Application|Factory
    {
        return view('users.create');
    }
    //会输出表单所有请求参数，然后页面就停止，不会继续往下执行。
    #[NoReturn] public function  store(Request $request):void
    {
        dd($request->all());
        //1.验证请求数据
        //2.创建用户
        //3.重新定向用户列表或其他页面
    }
    //显示用户信息
    //会打印 $id 的值（你传进来的参数），然后停止执行。
    #[NoReturn] public function show(?int $id = 99): void
    {
        dd($id);
    }
}
