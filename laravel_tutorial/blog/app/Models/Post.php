<?php
namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;

class Post {
    public static function find($slug){

        // btw also base_path and app_path ect.. exist as global functions
        //_DIR__."/../resources/ == resource_path()
        $path = resource_path("posts/{$slug}.html");
        if(!file_exists($path)){
            throw new ModelNotFoundException();
        }
    
        return cache()->remember("posts.{$slug}", now()->addMinute(1), fn() => file_get_contents($path));
    }

    public static function all(){
        $files = File::files(resource_path("posts/"));
        //like a loop but returns a new array
        return array_map(function ($file){
            return $file->getContents();
        }, $files); //second arg thing we are looping overs
    }
}