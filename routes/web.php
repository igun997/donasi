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

Route::get("/",function (){
   return redirect(route("front.home"));
});

Route::prefix("/front")->namespace("Front")->group(function (){
    Route::get("/","Home@index")->name("front.home");
    Route::get("/detail/{id}","Home@kegiatan_detail")->name("front.kegiatan");
});

Route::get("/login","Auth@page_login")->middleware("gateway");
Route::post("/login","Auth@login")->middleware("gateway")->name("login");

Route::get("/register","Auth@page_register")->middleware("gateway");
Route::post("/register","Auth@register")->middleware("gateway")->name("register");

Route::get("/logout","Auth@logout")->middleware("gateway");

Route::prefix("donatur")->namespace("Donatur")->middleware("gateway:0")->group(function (){
    Route::get("/","Pages@home");
    Route::get("/donasi","Pages@donasi");
    Route::get("/donasi/add","Pages@donasi_add")->name("donasi.add");
    Route::post("/donasi/add","System@donasi_insert")->name("donasi.add.insert");

});

Route::prefix("sekretaris")->namespace("Sekretaris")->middleware("gateway:1")->group(function (){
    Route::get("/","Pages@home");
    Route::get("/donatur","Pages@donatur")->name("sekretaris.donatur");
    Route::get("/donatur/verifikasi/{id}/{status}","System@donatur_verifikasi")->name("sekretaris.donatur.verifikasi");

    Route::get("/category","Pages@category")->name("category.list");
    Route::get("/category/update/{id}","Pages@category_update")->name("category.page.update");
    Route::get("/category/add","Pages@category_add")->name("category.insert.page");
    Route::get("/category/delete/{id}","System@category_delete")->name("category.delete");
    Route::post("/category/update/{id}","System@category_update")->name("category.update");
    Route::post("/category/add","System@category_insert")->name("category.insert");

    Route::get("/kegiatan","Pages@kegiatan")->name("kegiatan.list");
    Route::get("/kegiatan/detail/{id}","Pages@kegiatan_detail")->name("kegiatan.detail");
    Route::get("/kegiatan/add","Pages@kegiatan_add")->name("kegiatan.add");
    Route::get("/kegiatan/add/partisipan","Pages@kegiatan_add_partisipan")->name("kegiatan.add.partisipan");
    Route::post("/kegiatan/add/partisipan","System@kegiatan_insert_partisipan")->name("kegiatan.insert.partisipan");
    Route::post("/kegiatan/add","System@kegiatan_insert")->name("kegiatan.insert");
    Route::get("/kegiatan/update/{id}","Pages@kegiatan_update")->name("kegiatan.page.update");
    Route::post("/kegiatan/update/{id}","System@kegiatan_update")->name("kegiatan.update");
    Route::post("/kegiatan/delete/{id}","System@kegiatan_delete")->name("kegiatan.delete");

});

Route::prefix("bendahara")->namespace("Bendahara")->middleware("gateway:2")->group(function (){
    Route::get("/","Pages@home");
    Route::get("/donasi","Pages@donatur")->name("donasi.donatur");
    Route::get("/donasi/verifikasi/{id}/{status}","System@donasi_verifikasi")->name("donasi.donatur.verifikasi");
    Route::get("/operasional","Pages@operasional")->name("operasional.donatur");
    Route::get("/laporan","Pages@laporan")->name("laporan.donatur");

});
