<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        // Post::latest()->with('category')->get();

        // $posts = Post::latest()->with('category');

        // if (request('search')) {
        //     $posts
        //         ->where('title', 'like' , '%' . request('search') . '%')
        //         ->orWhere('body', 'like' , '%' . request('search') . '%');
        // }

        return view('posts', [
            // latest() orders them with the most recent at the top
            // 'posts' => $posts->get(),
            'posts' => Post::latest()->with('category')->filter(request(['search']))->get(),

            // 'categories' => Category::all()
        ]);
    }
    
    public function show (Post $post)
    {
        // find post by its slug and pass it to a view call 'post'
        return view('post', [
            'post' => $post->load(['category'])
        ]);
    }

}
