<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;

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

//[PostController::class, 'index'] //path to controller + name of function want to call
Route::get('/', [PostController::class, 'index'])->name('home');

//alternatively can following fct to model and just use {post}: 
//public function getRouteKeyName() {
//  return 'slug';     
//}
//if {post} instead of {post:slug}(w/o the function above), then laravel defaults to use id to find post
//gimme post where 'slug' matches the wildcard ($post)'s slug attribute
//IF THIS CONCEPT CONFUSES YOU JUST TRY LOAD PAGE AND SEE WHAT IS IN URI
//notice its bit more sneaky, have to look at inputs of 'show' function now
Route::get('/posts/{post:slug}', [PostController::class, 'show']);//->where('post', '[A-z\-]+');
Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);


//routes not longer needed i merged it with PostController
// Route::get('/authors/{author:username}', function (User $author) { //Post::where('username', $author)->firstOrFail()
//     //basically find user with given username and return view with his posts
//     return view('posts.index', [
//         //load with category and author so want to reload everytime.
//         'posts'=> $author->posts->load(['category', 'author']), //this works cuz of eloquent relationship setup on model
//         'categories'=> Category::all(),
//     ]);
// });
// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts.index', [
//         'posts'=> $category->posts,
//         'currentCategory'=>$category,
//     ]);
// });
