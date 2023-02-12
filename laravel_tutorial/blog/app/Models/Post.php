<?php
namespace App\Models;


use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post {

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
    public static function find($slug) {
       return static::all()->firstWhere('slug', $slug);
    }

    public static function all() {
        $files = File::files(resource_path(("posts/")));
        //first map to docs then to Post objects
        return collect($files)
            ->map(fn($file) => YamlFrontMatter::parseFile($file))
            ->map(fn($document) => new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug,
            ));
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
