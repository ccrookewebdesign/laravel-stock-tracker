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
