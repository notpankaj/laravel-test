<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Song;
use App\Models\Singer;

class SingerController extends Controller
{
    public function add_singer(){
        // $singer = new Singer();
        // $singer->name = 'tony';
        // $singer->save();

        // // piviot table add data
        // $songId = [1,2];
        // $singer->songs()->attach($songId);
       
        $singer = new Singer();
        $singer->name = 'neha';
        $singer->save();

        // piviot table add data
        $songId = [1,3,5];
        $singer->songs()->attach($songId);
    }

    public function show_singer($id){
        $singers =  Song::find($id)->singers;
        return $singers;

    }
}
