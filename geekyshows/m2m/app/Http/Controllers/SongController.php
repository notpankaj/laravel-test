<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Song;
use App\Models\Singer;

class SongController extends Controller
{
    public function add_song(){
        $song = new Song();
        $song->title = 'Baby chocolate hai';
        $song->save();

        // $song2 = new Song();
        // $song2->title = 'Baby ice-cream hai';
        // $song2->save();
        
        // $song3 = new Song();
        // $song3->title = 'Baby bread hai';
        // $song3->save();
        
        // $song4 = new song();
        // $song4->title = 'Baby corona hai';
        // $song4->save();
        
        // $song5 = new Song();
        // $song5->title = 'Baby vaccin hai';
        // $song5->save();
    }

    public function show_song($id){

        $songs =  Singer::find($id)->songs;
        return $songs;

    }
}
