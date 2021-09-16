<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

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

}
