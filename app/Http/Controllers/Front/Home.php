<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(){
        $data = Kegiatan::all();
        return view("front.home",[
            "data"=>$data,
            "title"=>"Selamat Datang"
        ]);
    }
    public function kegiatan_detail($id){
        $data = Kegiatan::where(["id"=>$id]);
        if ($data->count() > 0){
            return view("front.kegiatan",[
                "data"=>$data->first(),
                "title"=>$data->first()->nama
            ]);
        }else{
            return back();
        }
    }
}
