<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index(){
        return view('admin.posts.index', [
            'posts' => Post::paginate(50),
        ]);
    }

    public function edit(Post $post) {
        return view('admin.posts.edit',[
            'post'=>$post,
        ]);
    }

    public function update(Post $post) {
        $attributes = request()->validate([
            'title'=>'required',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post->id)],
            'excerpt'=>'required',
            'body'=>'required',
            'category_id'=>['required', Rule::exists('categories', 'id')],
        ]);

        if(isset($attributes['thumbnail'])) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return back()->with('success', 'Post updated');
 
    }

    public function destroy(Post $post){
        $post->delete();

        return back()->with('success', 'Post updated');
    }
}
