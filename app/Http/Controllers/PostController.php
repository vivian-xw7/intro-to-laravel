<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use vendor\laravel\framework\src\Illuminate\Validation\Rule;
// use Illuminate\Validation\Rule;
// use Illuminate\Contracts\Validation\Rule;

class PostController extends Controller
{
    public function index()
    {

        return view('posts.index', [

            'posts' => Post::latest()->with('category')->filter(
                request(['search', 'category', 'user'])
            )->paginate(6)->withQueryString(),

            'categories' => Category::all(),
            'currentCategory' => Category::where('slug', request('category'))->first()
        ]);

    }
    
    public function show (Post $post)
    {
        // find post by its slug and pass it to a view call 'post'
        return view('posts.show', [
            'post' => $post->load(['category'])
        ]);
    }

    public function create ()
    {
        return view('posts.create');
    }

    public function store ()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'slug' => 'required', // [Rule::unique('posts', 'slug')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => 'required' // [Rule::exists('categories', 'id')]
        ]);

        $attributes['user_id'] = auth()->id();

        Post::create($attributes);

        return redirect('/');
    }
}
