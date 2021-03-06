<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;
// use vendor\laravel\framework\src\Illuminate\Validation\Rule;


class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::paginate(50)
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {

        $post = new Post();

        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists() ? ['image'] : ['required', 'image'],
            // 'thumbnail' => 'required|image',
            'slug' => 'required|unique:posts,slug',
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id' // Does not like this format: [Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');

        Post::create($attributes);

        return redirect('/');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = request()->validate([
            'title' => 'required',
            'thumbnail' => $post->exists() ? ['image'] : ['required', 'image'],
            // 'thumbnail' => 'image',
            'slug' => 'required', //|unique:posts,slug', // can't find ignore() for this format
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id' // Does not like this format: [Rule::exists('categories', 'id')]
        ]);

        if(isset($attributes['thumbnail'])) {
            $attributes[$thumbnail] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post Deleted!');
    }
}
