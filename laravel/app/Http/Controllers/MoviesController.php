<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    //
    public function index(): Application|View|Factory
    {
        $movies = Movie::paginate(20);
        return view('movies.index', ['movies' => $movies]);
    }
}
