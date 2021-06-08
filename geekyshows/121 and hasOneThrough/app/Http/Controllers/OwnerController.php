<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mechanic;
use App\Models\Owner;
use App\Models\Car;

class OwnerController extends Controller
{
    public function add_owner($id){
        $car = Car::find($id);
        
        $owner = new Owner();
        $owner->name = 'sonam';
        
        $car->owner()->save($owner);
    }    

  
}
