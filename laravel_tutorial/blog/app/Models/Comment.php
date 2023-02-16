<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function post(){
        //Relationships: hasOne, hasMany, belongsTo, belongsToMany
        return $this->belongsTo(Post::class);
    }

    public function author(){
        //Relationships: hasOne, hasMany, belongsTo, belongsToMany
        //excplicit that associating author to user_id, else laravel auto-fills with auther_id
        return $this->belongsTo(User::class, $foreignKey = 'user_id');
    }
}
