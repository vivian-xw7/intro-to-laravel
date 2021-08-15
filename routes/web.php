<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

Route::get('/', function () {

    return view('posts', [
        'posts' => Post::all()
    ]);

});


Route::get('posts/{post}', function ($slug) {

    // find post by its slug and pass it to a view call 'post'
    return view('post', [
        'post' => Post::findOrFail($slug)
    ]);

});


