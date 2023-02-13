<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;

use Illuminate\Support\Facades\File;

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
    //dd("gets all");
    return view('posts', [
        'posts' =>  Post::with('category')->get(),
    ]);
});

//alternatively can following fct to model and just use {post}: 
//public function getRouteKeyName() {
//  return 'slug';     
//}
//if {post} instead of {post:slug}(w/o the function above), then laravel defaults to use id to find post
//gimme post where 'slug' matches the wildcard ($post)
Route::get('/posts/{post}', function(Post $post) { //Post::where('slug', $post)->firstOrFail()
    return view('post', [
        'post'=> $post,
    ]);
});//->where('post', '[A-z\-]+');

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts'=> $category->posts,
    ]);
});
