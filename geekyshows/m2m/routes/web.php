<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\SingerController;
use App\Http\Controllers\SongController;


Route::get('/add-song',[SongController::class,'add_song']);
Route::get('/add-singer',[SingerController::class,'add_singer']);

Route::get('/show-song/{id}',[SongController::class,'show_song']);
Route::get('/show-singer/{id}',[SingerController::class,'show_singer']);
