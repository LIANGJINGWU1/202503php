<?php

namespace App\Http\Controllers;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;

class IndexController extends Controller{
    public function home(): View|Application|Factory
    {
        return view('index.home');
    }
}
