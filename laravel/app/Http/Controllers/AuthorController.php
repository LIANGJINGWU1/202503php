<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Application|View|Factory
    {
        $authors = Author::with('posts')->paginate($this->perPage);
        return view('authors.index', compact('authors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory
    {
        return view('authors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        //validate按照你给的规则，检查用户提交的数据是否合格，如果不合格就自动重定向回上一个页面，并附带错误信息（并保留旧输入）。
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:authors,email',
            'bio' => 'nullable|string|max:1000',
        ]);

        Author::create($request->only('name', 'email', 'bio'));//最终只有这三个会被用来创建 Author 记录
        //[
        //    'name' => $request->input('name'),
        //    'email' => $request->input('email'),
        //    'bio' => $request->input('bio'),
        //]

        // session()->flash('success', 'Author created successfully.');
        return redirect()->route('authors.index')->with('success', 'Author created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Author $author): View|Application|Factory
    {
        return view('authors.show', ['author' => $author]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Author $author): View|Application|Factory
    {
        return view('authors.edit', ['author' => $author]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Author $author)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Author $author): RedirectResponse
    {
        $author->delete();
        return redirect()->route('authors.index')->with('success', 'Author deleted successfully.');
    }
}
