<?php

use App\Comment;
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
    //$comment = Comment::create(['body' => 'Chris was  here']);
    // $comment->boomDaddy();
    /*$url = 'https://api.bestbuy.com/v1/products/6364253.json?apiKey=7FUP2jgeI6QPeH2e1HNBFvrH';
    $product = \Illuminate\Support\Facades\Http::get($url)->json();
    $product['salePrice'];*/

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
