<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\MobileController;
// use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MechanicController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\OwnerController;

// Route::get('/',[CustomerController::class,'add_customer']);
// Route::get('/show-mobile/{id}',[CustomerController::class,'show_mobile']);
// Route::get('/show-customer/{id}',[MobileController::class,'show_customer']);



Route::get('/add-mec',[MechanicController::class,'add_mechanic']);
Route::get('/add-car/{id}',[CarController::class,'add_car']);
Route::get('/add-owner/{id}',[OwnerController::class,'add_owner']);
Route::get('/show-owner/{id}',[MechanicController::class,'show_owner']);


