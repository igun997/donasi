<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Pages extends Controller
{
    public function home(){
        return view("donatur.home",[
            "title"=>"Beranda Donatur"
        ]);
    }
    public function donasi(){
        return view("donatur.donasi",[
            "title"=>"Data Donasi Saya"
        ]);
    }
}
