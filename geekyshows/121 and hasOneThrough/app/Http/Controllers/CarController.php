<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mechanic;
use App\Models\Owner;
use App\Models\Car;

class CarController extends Controller
{
    public function add_car($id){
        $mec = Mechanic::find($id);

        $car = new Car();
        $car->name = 'tesla';
        $car->model = 'i10';
        $mec->car()->save($car);
    } 
}
