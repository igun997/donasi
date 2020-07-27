<?php

namespace App\Http\Controllers\Sekretaris;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Kegiatan;
use App\Models\KegiatanPartisipan;
use App\Models\User;
use Illuminate\Http\Request;

class Pages extends Controller
{
    public function home(){
        $total = User::where(["level"=>0,"status"=>0])->count();
        $verified = User::where(["level"=>0,"status"=>1])->count();
        $tolak = User::where(["level"=>0,"status"=>2])->count();
        return view("sekretaris.home",[
            "title"=>"Beranda Sekretaris",
            "total"=>$total,
            "verified"=>$verified,
            "tolak"=>$tolak,
        ]);
    }
    public function kegiatan(){
        $data = Kegiatan::all();
        return view("sekretaris.kegiatan",[
            "title"=>"Data Kegiatan",
            "data"=>$data
        ]);
    }
    public function laporan(){
        return view("sekretaris.laporan",[
            "title"=>"Laporan",
            "data"=>null
        ]);
    }
}
