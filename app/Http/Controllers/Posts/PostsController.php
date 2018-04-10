<?php

namespace App\Http\Controllers\Posts;

use App\Category;
use App\Http\Requests\Posts\PostsRequest;
use App\Post;
use cebe\markdown\GithubMarkdown;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'])->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::latest()->get();
        $categories = Category::all();
        if (\request('category')) {
            $posts = Post::where('category_id', request('category'))->get();
            return view('posts.post_index', compact('posts', 'categories'));
        }

        return view('posts.post_index', compact('posts', 'categories'));
    }

    public function create()
    {
        $post = new Post();
        $categories = Category::pluck('name', 'id');
        return view('posts.post_create', compact('post', 'categories'));
    }


    public function store(PostsRequest $request)
    {
        $post = auth()->user()->posts()->create($request->all());
       return redirect($post->path());
    }


    public function show(Post $post)
    {
        return view('posts.post_show', compact('post'));
    }


    public function edit(Post $post)
    {
        $this->authorize('update', $post);

        $categories = Category::pluck('name', 'id');
      return view('posts.post_edit', compact('post', 'categories'));
    }


    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);

        $post->update($request->all());

        return redirect($post->path());
    }


    public function destroy(Post $post)
    {
        $this->authorize('update', $post);

       $post->delete();
       return redirect('/');
    }
}
