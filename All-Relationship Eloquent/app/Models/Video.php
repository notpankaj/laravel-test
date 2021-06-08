<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $guarded = [];

    // public function comments(){
    //     return $this->morphMany(comment::class,'commentable');
    //     //model, identifier
    // }
    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
        
    } 
}
