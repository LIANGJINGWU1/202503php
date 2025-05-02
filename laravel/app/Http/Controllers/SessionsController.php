<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\View\View;
use JetBrains\PhpStorm\NoReturn;

class SessionsController extends Controller
{
    public function create():View
    {
        return view('sessions.login');
    }


#[NoReturn] public function  store(Request $request): void
{
    dd($request->all());
}
public function destory(): Application|Redirector|RedirectResponse
{
    auth()->logout();
    return redirect('/login');
}
}
