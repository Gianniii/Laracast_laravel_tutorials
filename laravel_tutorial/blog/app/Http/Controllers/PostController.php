<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PostController extends Controller {

    public function index(){
       
        //dd("gets all");
        return view('posts.index', [
            //eager load category and author(preload)(avoid N+1 prob)and get results

            'posts' =>  Post::latest()->filter(request(['search', 'category', 'author']))->paginate(6)->withQueryString(), 
            //'categories'=> Category::all(), //No longer necessary thanks to CategroyDrowndown.php file
            //'currentCategory'=> Category::where('slug', request('category'))->first() //get category where the slug is in the request
        ]);
    }

    public function show(Post $post){
        return view('posts.show', [
            'post'=> $post,
        ]);
    }

    public function create(){
        return view('posts.create');
    }

    public function store(){
        $attributes = request()->validate([
            'title'=>'required',
            'thumbnail' => 'required|image',
            'slug' => ['required', Rule::unique('posts', 'slug')],
            'excerpt'=>'required',
            'body'=>'required',
            'category_id'=>['required', Rule::exists('categories', 'id')],
        ]);

        $attributes['user_id'] = auth()->id();    //add user id to attributed    
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnail');

        Post::create($attributes);

        return redirect('/');

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
