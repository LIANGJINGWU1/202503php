<?php
namespace App\Http\Controllers;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;

class TestController extends Controller{
    public function index(): Factory|Application|View
    {
        return view('tests.index');
    }
    public function index2(): Factory|Application|View
    {
        return view('tests.index2');
    }
}
