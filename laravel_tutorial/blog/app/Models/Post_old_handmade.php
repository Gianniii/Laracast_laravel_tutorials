<?php
namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post_old_handmade {

    public $title;
    public $excerpt;
    public $date;
    public $body;
    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug){
        $this->title = $title;
        $this->excerpt =$excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;
    }

    //Out of all blog posts find the one with the slug that matches
    public static function findOrFail($id) {
       $post = static::find($id);
       if(!$post) {
            throw new ModelNotFoundException();
       }
       return $post;
    }

    public static function find($slug) {
        return static::all()->firstWhere('slug', $slug);
     }

    public static function all() {
        //first map to docs then to Post objects
        return cache()->rememberForever('posts.all', function() {
            return collect(File::files(resource_path(("posts/"))))
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug,
            ))->sortByDesc('date');
        });
        
        //basically iterate through files and for each file add a newpost to $posts
        // $posts = array_map(function($file) {
        //     $document = YamlFrontMatter::parseFile($file);
        
        //     return new Post(
        //         $document->title,
        //         $document->excerpt,
        //         $document->date,
        //         $document->body(),
        //         $document->slug,
        //     );
        // },$files);

    }
   

}
