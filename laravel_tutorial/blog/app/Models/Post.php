<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //want id to auto-gen dont want it be assigned by a user's.
    //mass assignment allow for all but id
    //Sol1) 
    protected $guarded =['id']; //all fillable except whts in array

    protected $with = ['category', 'author'];
    //Sol2)
    //protected $fillable = ['title', 'excerpt', 'body'] //mass assignment allowed only for these fields
    //Sol3) just never allow mass assignment, and we always exclicitely set every key-value pair

    //invoked by ->filter()
    public function scopeFilter($query, array $filters){ //$query === Post::newQuery()-

        $query->when($filters['search'] ?? false, fn($query, $search) => 
            $query->where(fn($query) =>
                $query->where('title', 'like', '%'.request('search').'%') 
                ->orWhere('body', 'like', '%'.request('search').'%')
                )
        );

        //if got category filter(i.e uri has ?category=...), then add this to query
        $query->when($filters['category'] ?? false, fn($query, $category) => 
            $query->whereHas('category', fn($query) => 
                $query->where('slug', $category)
            )
        );
        if($filters['author'] ?? false) {
            $query 
                ->where('author', 'like', '%' .request('search'). '%')
                ->orWhere('username', 'like', '%'.request('search').'%');
        }
    }

    public function category(){
        //Relationships: hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }

    public function author(){
        //Relationships: hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(User::class, $foreignKey = 'user_id');
    }
}
