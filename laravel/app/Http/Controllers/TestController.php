<?php
namespace App\Http\Controllers;
use App\Models\Categories;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class TestController extends Controller{
    public function index(): Factory|Application|View
    {
        $data = [
          'name' => 'whatname',
          'version' => 'v1.0.0',
          'author' => '66666',
        ];
        $author = 'liangjingwu';
        $html = '<h1 class="text-4xl">Hello World</h1>';
        //$categories = DB::table('categories')->select('id', 'name')->
        //where('name', 'like','c%')->paginate($this->perPage);
        //查询c开头的name
//        $categories = DB::table('products')
//        ->leftJoin('categories', 'products.category_id',
//            '=', 'categories.id')
//        ->select('products.*', 'categories.name as category_name')
//        ->paginate($this->perPage);

//        get获取所有
//        $categories = DB::table('categories')->get();//这是collection对象
        //first() 返回的是一个对象（stdClass）,没有isEmpty方法,无法foreach,直接访问
//        $categories = DB::table('products')->where('status', 1)->first();

        //获取指定列的值列表pluck（）
        //是一个 Collection，类似 ['Alice', 'Bob', 'Charlie'],$categories 直接访问
//        $categories = DB::table('products')->pluck('name');

        //Select 子句.起别名后只能用别名
//        $categories = DB::table('products')->select('id', 'name as n' )
//            ->where('status', 1)->get();

        //where字句过滤
        $categories = DB::table('products')->where('id', '>=', 10)->get();
        $categories = DB::table('products')->where('name', 'like', 'm%')
            ->orWhere('id', '>', 10)->get();
        //参数分组

        $categories = DB::table('products')->where('name', 'like', 'm%')
            ->where(function ($query){
                $query->where('id', '>=', 10);
            })->get();

        $categories = DB::table('products')->whereBetween('id', [10, 20])->get();
        $categories = DB::table('products')->whereIn('id', [10, 20,30])->get();
        $categories = DB::table('products')->whereDate('created_at', '2025-05-07 ')->get();

        //排序、分组、限制与偏移 asc升， desc降
        $categories = DB::table('products')->where('id', '>=', 10)->
        orderBy('price', 'desc')->take(3)->get();
        //获取第二页
        $page = 2;
        $perPage = 3;
        $categories = DB::table('products')->skip(($page - 1) * $perPage)->take($perPage)->get();

        //连接


        //插入//返回的是布尔值
        $categories = DB::table('products')->insert([
            'name' => 'ljw',
            'price' => 2000,
            'category_id' => 1,
            'stock' => 66,
            'status' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //改--返回受影响的行数
        $categories = DB::table('products')->where('id' , 1)
            ->update(['price' => 2000]);
        //删//返回被删除的行数
        $categories = DB::table('products')->where('id' , 2)
            ->delete();
        //检索模型
        $categories = Product::all();
        $categories =  Product::where('status', 1)
            ->orderBy('price', 'desc')->take(3)->get();

        //如果找到则返回模型对象，找不到则返回 null。
        $userId = 1;
        $categories = Product::find($userId);

        try {
            $id = 20; // 假设 ID 100 不存在
            $userOrFail = Product::findOrFail($id);
// 如果找到，代码继续执行
            echo "找到用户 (findOrFail): " . $userOrFail->name . "\n";
        } catch (ModelNotFoundException $e) {
// 如果找不到，会捕获到异常
            echo "ID 为 {id} 的用户不存在 (触发了 404)。\n";
// abort(404); // 可以手动触发 404 页面
        }
        return view('tests.index', compact('data',
            'author', 'categories', 'html'));



    }
    public function index2(): Factory|Application|View
    {
        return view('tests.index2');
    }
}
