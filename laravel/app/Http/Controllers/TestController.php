<?php
namespace App\Http\Controllers;
use App\Models\Categories;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
class TestController extends Controller{
    public function index(): Factory|Application|View
    {
        $data = [
          'name' => 'whatname',
          'version' => 'v1.0.0',
          'author' => '66666',
        ];

        $author = 'liangjingwu';

        $categories = Categories::paginate($this->perPage);

        $html = '<h1 class="text-4xl">Hello World</h1>';
        return view('tests.index', compact('data', 'author', 'categories', 'html'));
    }
    public function index2(): Factory|Application|View
    {
        return view('tests.index2');
    }
}
