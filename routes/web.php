<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {

    $files = File::files(resource_path("posts"));

    // collect is functionally the same as map_array
    $posts = collect($files)

        ->map(fn($file) => YamlFrontMatter::parseFile($file))

        ->map(fn($document) => new Post(
                $document -> title,
                $document -> exerpt,
                $document -> date,
                $document -> body(),
                $document -> slug
            )
        );

    return view('posts', [
        'posts' => $posts
    ]);

});


Route::get('posts/{post}', function ($slug) {

    // find post by its slug and pass it to a view call 'post'
    $post = Post::find($slug);

    return view('post', [
        'post' => Post::find($slug)
    ]);

}) -> where('post', '[A-z_\-]+');


