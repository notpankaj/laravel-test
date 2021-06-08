<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // protected  $fillable =  ['user_id','title'];
    protected $guarded = [];


    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id')
        ->withDefault([
            'name' => 'Guest User'
        ]);
    }

    // public function tags(){
    //     return $this
    //         ->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id')
    //         ->withTimestamps()
    //         ->withPivot('status');
    // } 
    
    public function comments(){
        return $this->morphMany(comment::class,'commentable');
        //model, identifier
    }
    
    public function comment(){
        return $this->morphOne(comment::class,'commentable')->latest();
        //model, identifier
    }

    public function tags(){
        return $this->morphToMany(Tag::class, 'taggable');
             //model, identifier
    } 
}
 