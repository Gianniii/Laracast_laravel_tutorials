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
    //Sol2)
    //protected $fillable = ['title', 'excerpt', 'body'] //mass assignment allowed only for these fields
    //Sol3) just never allow mass assignment, and we always exclicitely set every key-value pair

    public function category(){
        //Relationships: hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Category::class);
    }
}
