<?php

use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;



Route::get('/', function () {

    return view('posts', [
        'posts' => Post::with('category')->get()
    ]);

});

Route::get('posts/{post:slug}', function (Post $post) {

    // find post by its slug and pass it to a view call 'post'
    return view('post', [
        'post' => $post
    ]);

});

Route::get('categories/{category:slug}', function(Category $category) {

    return view('posts', [
        'posts' => $category->posts
    ]);

});


