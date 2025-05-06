<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index(): Factory|Application|View
    {
        $cart = session()->get('cart', []);
        return view('cart.index', compact('cart'));
    }
    public function add(Request $request)
    {
//        dd($request->all());
//        $movie = Movie::find($request->input('code'));
        $movie = Movie::where('code', $request->input('code'))->first();
//        dd($request->input('code'), $movie);
        if(!$movie){
            return redirect()->back()->with('error', '商品不存在');
        }

        $cart = session()->get('cart', []);
        $cart[$movie->code] = [
            'code' => $movie->code,
            'title' => $movie->title
        ];
        session()->put('cart', $cart);

        return redirect()->back()->with('success', '已加入购物车');

    }
    public function remove(Request $request)
    {
        $cart = session()->get('cart', []);
        unset($cart[$request->input('code')]);
        session()->put('cart', $cart);

        return redirect()->back()->with('success', '已移除商品');
    }
}
