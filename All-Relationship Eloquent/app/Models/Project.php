<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = ['title'];

    function users(){
       return  $this->belongsToMany(User::class);
    }

    // public function tasks(){
    //     return $this->hasManyThrough(Task::class,User::class ,"project_id","user_id",'id');
    //     // taks_model ,user_model ,user.project_id ,task.user_id,project.id
    //     // has many Task throught User
    // }
    // public function task(){
    //     return $this->hasOneThrough(Task::class,User::class ,"project_id","user_id",'id');
    //     //same as hasManyThrought just it return single task instend of array of task
    // }

    public function tasks(){
        return $this->hasManyThrough(
            Task::class,
            Team::class,
            'project_id', //f.key in pivot table
            'user_id', //f.key in task table
            'id', //local key in project table
            'user_id', //f.key in pivot table
            
        );
    }
    public function task(){
        return $this->hasOneThrough(
            Task::class,
            Team::class,
            'project_id', //f.key in pivot table
            'user_id', //f.key in task table
            'id', //local key in project table
            'user_id', //f.key in pivot table
            
        );
    }
}
