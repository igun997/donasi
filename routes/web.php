<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/","Auth@page_home")->middleware("gateway");

Route::get("/login","Auth@page_login")->middleware("gateway");
Route::post("/login","Auth@login")->middleware("gateway")->name("login");

Route::get("/register","Auth@page_register")->middleware("gateway");
Route::post("/register","Auth@register")->middleware("gateway")->name("register");

Route::get("/logout","Auth@logout")->middleware("gateway");

Route::prefix("donatur")->namespace("Donatur")->middleware("gateway:0")->group(function (){
    Route::get("/","Pages@home");
    Route::get("/donasi","Pages@donasi");
});
