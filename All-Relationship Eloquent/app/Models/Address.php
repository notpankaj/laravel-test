<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','country'];


    //belongs to
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    // return $this->belongsTo(User::class,'user_id, id );
    //user model , foregin of user table , primary or other key in address table  
    

    // public function owner()
    // {
    //     // return $this->belongsTo(User::class); // select * from address where owner_id  =  addresss.id
    //     return $this->belongsTo(User::class, 'user_id', 'id'); //will work 
    // }


}
