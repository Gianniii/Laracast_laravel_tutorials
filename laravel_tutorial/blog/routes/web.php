<?php

use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\AdminPostController;
use App\Services\Newsletter;

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


Route::post('/newsletter', NewsletterController::class); //single function controller example

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
Route::get('/register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('/login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('/logout', [SessionsController::class, 'destroy'])->middleware('auth');
Route::post('/sessions', [SessionsController::class, 'store'])->middleware('guest'); //could do /login ect.. here just use /sessions cuz sessions controller
Route::post("/posts/{post:slug}/comments", [PostCommentsController::class, 'store']); //could also do "/comments"


// Admin
Route::middleware('can:admin')->group(function() {
    Route::post("/admin/posts", [PostController::class, 'store']);
    Route::get('/admin/posts/create', [PostController::class, 'create']);
    Route::get('/admin/posts', [AdminPostController::class, 'index']);
    Route::get('/admin/posts/{post}/destroy', [AdminPostController::class, 'destroy']);
    Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
    Route::patch('admin/posts/{post}/edit', [AdminPostController::class, 'update']);
    Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);

});




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
