<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mechanic;
use App\Models\Owner;
use App\Models\Car;

class MechanicController extends Controller
{
    public function add_mechanic(){
        $mec = new Mechanic();
        $mec->name = 'tom';
        $mec->save();
    } 

    public function show_owner($id){

        // without hasOneThroug
        // $owner =  Mechanic::find($id)->car->owner;
        
        // with hasOneThroug
        $owner = Mechanic::find($id)->owner;

        return $owner;
    }
}
