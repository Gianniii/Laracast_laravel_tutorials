<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PostController extends Controller {

    public function index(){
       
        //dd("gets all");
        return view('posts.index', [
            'posts' =>  Post::latest()->
                filter(request(['search', 'category', 'author']))
                ->paginate(6), //eager load category and author(preload)(avoid N+1 prob)and get results
            'categories'=> Category::all(),
            'currentCategory'=> Category::where('slug', request('category'))->first()
        ]);
    }

    public function show(Post $post){
        return view('posts.show', [
            'post'=> $post,
        ]);
    }

    // protected function getPosts(){
    //     return Post::latest()->filter(request(['search', 'category', 'author']))->get();//removed get to put paginate
    //     // $posts = Post::latest();

    //     // if(request('search')) {
    //     //     $posts->where('title', 'like', '%' .request('search'). '%')
    //     //     ->orWhere('body', 'like', '%'.request('search').'%');
    //     // }

    //     // return $posts->get();
    // }
   
}
