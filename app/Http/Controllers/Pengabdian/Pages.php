<?php

namespace App\Http\Controllers\Pengabdian;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Kegiatan;
use App\Models\KegiatanPartisipan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;

class Pages extends Controller
{
    public function home(){
        return view("pengabdian.home",[
            "title"=>"Beranda Bid. Pengabdian Masyarakat"
        ]);
    }

    public function donatur(){
        $res = Transaksi::where(["jenis"=>1])->whereNotNull("user_id")->get();
        return view("pengabdian.donasi",[
            "title"=>"Data Donasi",
            "data"=>$res
        ]);
    }

    public function donatur_plus(){
        return view("pengabdian.donasi_form",[
            "title"=>"Dana Masuk",
            "type"=>1,
            "data"=>null
        ]);
    }


}
