<?php
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
//这个请求交给 TestController 控制器里的 index() 方法来处理
//name('test.index')给这个路由起个名字
Route::get('/test', [TestController::class,'index'])->name('tes1t.index');
Route::get('/test2', [TestController::class,'index2'])->name('tes2t.index');
