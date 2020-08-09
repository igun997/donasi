<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class Home extends Controller
{
    public function index(){
        $masuk = Transaksi::where(["jenis"=>1,"status"=>1])->sum("total");
        $keluar = Transaksi::where(["jenis"=>2,"status"=>1])->sum("total");
        $total_masuk = $masuk;
        $total_keluar = $keluar;
        $total_sisa = $masuk - $keluar;
        $data = Kegiatan::all();
        return view("front.home",[
            "data"=>$data,
            "title"=>"Selamat Datang",
            "total_keluar"=>$total_keluar,
            "total_masuk"=>$total_masuk,
            "total_sisa"=>$total_sisa,
        ]);
    }

    public function kegiatan_detail($id){
        $data = Kegiatan::where(["id"=>$id,"atasan"=>1,"sekretaris"=>1]);
        if ($data->count() > 0){
            return view("front.kegiatan",[
                "data"=>$data->first(),
                "title"=>$data->first()->nama
            ]);
        }else{
            return back();
        }
    }

    public function tentang()
    {
        return view("front.tentang",[

        ]);
    }
}
