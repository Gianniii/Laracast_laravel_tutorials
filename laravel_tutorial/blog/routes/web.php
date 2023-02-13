<?php

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

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
        'posts' =>  Post::latest()->with('category', 'author')->get(), //eager load category and author(preload)(avoid N+1 prob)and get results
    ]);
});

//alternatively can following fct to model and just use {post}: 
//public function getRouteKeyName() {
//  return 'slug';     
//}
//if {post} instead of {post:slug}(w/o the function above), then laravel defaults to use id to find post
//gimme post where 'slug' matches the wildcard ($post)'s slug attribute
//IF THIS CONCEPT CONFUSES YOU JUST TRY LOAD PAGE AND SEE WHAT IS IN URI
Route::get('/posts/{post:slug}', function(Post $post) { //Post::where('slug', $post)->firstOrFail()
    return view('post', [
        'post'=> $post,
    ]);
});//->where('post', '[A-z\-]+');

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('posts', [
        'posts'=> $category->posts->load(['category', 'author']),
    ]);
});


Route::get('/authors/{author:username}', function (User $author) { //Post::where('username', $author)->firstOrFail()
    //basically find user with given username and return view with his posts
    return view('posts', [
        //load with category and author so want to reload everytime.
        'posts'=> $author->posts->load(['category', 'author']), //this works cuz of eloquent relationship setup on model
    ]);
});
