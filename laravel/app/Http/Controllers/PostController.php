<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Post;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        if($request->get('serch')){
            $posts = Post::with('author')
                ->where('title', 'LIKE', '%'.$request->get('serch').'%')
                ->orWhere('content', 'LIKE', '%'.$request->get('serch').'%')
                ->paginate($this->perPage);
        }else
            $post = Post::with('author')->paginate($this->perPage);
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View|Application|Factory
    {
       return view('posts.create', [
           'authors' => Author::all()
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
        if(!$request->has('author_id')){
            $request->merge(['author_id' => Author::pluck('id')->random()]);

        }
        //创建新的文章
        Post::create($request->only('title', 'content', 'author_id'));
        //重定向
        return redirect()->route('posts.index')->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post): View|Application|Factory
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View|Application|Factory
    {
        return view('posts.edit', compact('post',Author::all()));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post): RedirectResponse
    {
        //更新文章
        $post->update($request->only('title', 'content', 'author_id'));

        return redirect()->route('posts.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted successfully.');
    }
}
