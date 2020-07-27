<?php

namespace App\Http\Controllers\Ketua;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;

class Pages extends Controller
{
   public function home(){
       return view("ketua.home",[
           "title"=>"Beranda Ketua"
       ]);
   }

    public function kegiatan(){
        $data = Kegiatan::all();
        return view("ketua.kegiatan",[
            "title"=>"Data Kegiatan",
            "data"=>$data
        ]);
    }

    public function lap_donatur(){
        return view("ketua.lap_donatur",[
            "title"=>"Laporan Donatur",
            "data"=>null
        ]);
    }

    public function lap_keuangan(){
        return view("ketua.lap_keuangan",[
            "title"=>"Laporan Keuangan",
            "data"=>null
        ]);
    }
}
