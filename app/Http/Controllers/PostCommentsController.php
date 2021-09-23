<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        $post->comments->create([
            'user_id' => request()->user()->id,
            'body' => request('body')
        ]);
    }
}
