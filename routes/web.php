<?php

// always import you controllers

use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;



Route::post('newsletter', function() {

    request()->validate(['email' => 'required|email']);

    $mailchimp = new \MailchimpMarketing\ApiClient();

    $mailchimp->setConfig([
        'apiKey' => config('services.mailchimp.key'),
        'server' => 'us19'
    ]);

    try {
        $response = $mailchimp->lists->addListMember('a0d9eff468', [
            'email_address' => request('email'),
            'status' => 'subscribed'
        ]);
    } catch (\Exception $e) {
        throw \Illuminate\Validation\ValidationException::withMessages([
            'email' => 'This email could not be added to our newsletter.'
        ]);
    }

    return redirect('/')->with('success', 'You are now subscribed.');

});



// everything in here is connected to the controllers

Route::get('/', [PostController::class, 'index'])->name('home');

Route::get('posts/{post:slug}', [PostController::class, 'show']);
// because we are finding the post in post:slug, we need to pass Post as $post in show() of the controller
Route::post('posts/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::get('/authors/{user:username}', function(User $user) {
    return view('posts', [
        'posts' => $user->posts
    ]);
});



Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');


Route::get('login', [SessionsController::class, 'create'])->middleware('guest');

Route::post('login', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

