<?php

use App\Http\Controllers\Postcontroller;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;



Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('categories/{category:slug}', function(Category $category) {

    return view('posts', [
        'posts' => $category->posts->load(['category']),
        'currentCategory' => $category,
        // 'categories' => Category::all()
    ]);

})->name('category');


