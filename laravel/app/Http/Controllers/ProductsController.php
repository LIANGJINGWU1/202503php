<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class ProductsController extends Controller
{
    public  function index() : Factory|View|Application
    {
        return view('products.index');
    }

    public  function create()
    {

    }

    public  function store(Request $request)
    {

    }

    public  function show(Product $products)
    {

    }

    public function edit(Products $products)
    {

    }

    public function update(Request $request, Products $products)
    {

    }

    public function destroy(Products $products)
    {

    }

}
