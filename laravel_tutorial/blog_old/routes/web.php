<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
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
    echo "goes here";
    return view('posts', [
        'posts' => Post::all(),
    ]);
});

Route::get('/posts/{post}', function ($slug) {
    return view('post', [
        'post' => Post::find($slug),
    ]);
})->where('post', '[A-z\-]+');  //charas A to z and "_"symbol and + "one or more"
