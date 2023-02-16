<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Http\Request;

class PostCommentsController extends Controller {

    use HasFactory;

    protected $guarded = [];

    public function store(Post $post){
        //validation
        request()->validate([
            'body'=> 'required',
        ]);


        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'body' => request('body'),
        ]);

        //would this be equivalent to 
        /*Comment::create([
            'post_id' => $post->id;
            'user_id' => auth()->user()->id,
            'body' => request('body'),
        ]);*/

        return back(); //return redirect back to previous page.
    }
}
