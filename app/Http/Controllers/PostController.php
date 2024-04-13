<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Post\PostUpdateRequest;
use App\Tag;
use Illuminate\Http\Request;
use App\Post;
use App\Http\Requests\Post\PostStoreRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy("created_at","desc")->get();
        return view("post.index", compact("posts"));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view("post.create", compact("categories", "tags"));
    }

    public function store(PostStoreRequest $request)
    {
        $data = $request->validated();
        $tags = $data["tag_id"];
        unset($data["tag_id"]);

        $post = Post::create($data);
        $post->tags()->attach($tags);
        return redirect()->route('post.index');
    }

    public function show(Post $post)
    {
        return view('post.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('post.edit', compact('post',"categories", "tags"));
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        $data = $request->validated();
        $tags = $data["tag_id"];
        unset($data["tag_id"]);

        $post->update($data);
        $post->tags()->sync($tags);
        return redirect()->route('post.show', $post);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index');
    }

    public function restore()
    {
        Post::onlyTrashed()->restore();
        return redirect()->route('post.index');
    }
}