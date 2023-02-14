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
        return view('posts', [
            'posts' =>  $this->getPosts(), //eager load category and author(preload)(avoid N+1 prob)and get results
            'categories'=> Category::all(),
        ]);
    }

    public function show(Post $post){
        return view('post', [
            'post'=> $post,
        ]);
    }

    protected function getPosts(){
        return Post::latest()->filter(request(['search']))->get();
        // $posts = Post::latest();

        // if(request('search')) {
        //     $posts->where('title', 'like', '%' .request('search'). '%')
        //     ->orWhere('body', 'like', '%'.request('search').'%');
        // }

        // return $posts->get();
    }
   
}
