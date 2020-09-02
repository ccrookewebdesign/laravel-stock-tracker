<?php

use App\Comment;
use App\Rules\Recaptcha;
use Illuminate\Support\Facades\Route;

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
    /*$comment = App\Comment::create(['body' => 'Testing']);
    dd($comment);*/

    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('welcome');
})->name('about');

Route::get('/testimonials', function () {
    return view('welcome');
})->name('testimonials');

Route::get('/contact', function () {
    return view('welcome');
})->name('contact');

Route::get('/series', function () {
    return view('components.series');
})->name('series');

Route::get('/comments/{comment}/edit', function(Comment $comment){
    return view('comments.edit', compact('comment'));
});

Route::patch('/comments/{comment}', function(Comment $comment){
    $comment->update(
        request()->validate(['body' => 'required|string'])
    );

    return redirect("/comments/{$comment->id}/edit");
});

Route::delete('/comments/{comment}', function(Comment $comment){
    $comment->delete();

    return redirect("/");
});

Route::get('/posts/create', function () {
    return view('posts.create');
})->name('posts-create');

Route::post('/posts/', function () {
    request()->validate([
       'title' => 'required',
       'body' => 'required',
       'g-recaptcha-response' => ['required', new Recaptcha],
    ]);

    dd('validation passed');
})->name('posts-save');
