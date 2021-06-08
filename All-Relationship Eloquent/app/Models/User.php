<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'project_id'
        
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    // public function address(){
    //     return $this->hasOne(Address::class); //select * from Address where user_id = 1
    //     // return $this->hasOne(Address::class,uid,id); 
    //     //Model, forgin key inside modeltable ,  local key inside usertable,
    // }

    
    // public function addresses()
    // {
    //     return $this->hasMany(Address::class);
    // }
 
    // public function posts(){
    //     return $this->hasMany(Post::class, 'user_id', 'id');
    // }

    public function projects(){
        return $this->belongsToMany(Project::class);
    }
    
    
    public function tasks(){
        return $this->hasMany(Task::class);
    }
    
}
