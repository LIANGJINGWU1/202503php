<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MoviesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SessionsController;
use app\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

use App\Models\User;
//Route::get('/', function () {
//    return view('welcome');
//});
//这个请求交给 TestController 控制器里的 index() 方法来处理
//name('test.index')给这个路由起个名字
Route::get('/test', [TestController::class,'index'])->name('tes1t.index');
Route::get('/test2', [TestController::class,'index2'])->name('tes2t.index');


Route::get('/', [IndexController::class, 'home'])->name('home');
Route::get('/login', [SessionsController::class, 'create'])->name('login');
Route::post('/login', [SessionsController::class, 'store'])->name('login.store');
Route::get('/logout', [SessionsController::class, 'destroy'])->name('logout');

Route::get('/register', [UserController::class, 'create'])->name('register');
Route::post('/register', [UserController::class, 'store'])->name('register.store');
Route::get('/users/{id?}', [UserController::class, 'show'])->name('users.show');
//中间件
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
});
//路径前缀
//访问admin/下的users和settings
Route::prefix('admin')->group(function () {
   Route::get('/users', [AdminUserController::class, 'index']);
   Route::get('/settings', [AdminSettingController::class, 'index']);
});
//名称前缀
Route::name('admin.')->prefix('admin')-> group(function () {
    Route::get('/users', [AdminUserController::class, 'index'])->name('users.index');//路径全名：admin.users.index
    Route::get('/settings', [AdminSettingController::class, 'index'])->name('settings.index');//admin.settings.index
});
//子域名路由

//隐式路由模型,根据user ID返回页面
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');

Route::resource('categories', CategoriesController::class);

Route::resource('products', ProductsController::class);
//----------------------------------------
//mymovie
Route::get('/movies', [MoviesController::class, 'index'])->name('movies.index');




