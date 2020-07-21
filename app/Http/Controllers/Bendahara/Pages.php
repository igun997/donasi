<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class Pages extends Controller
{
    public function home(){
        $masuk = Transaksi::where(["jenis"=>1,"status"=>1])->sum("total");
        $keluar = Transaksi::where(["jenis"=>2,"status"=>1])->sum("total");
        $total_masuk = $masuk;
        $total_keluar = $keluar;
        $total_sisa = ($total_masuk - $total_keluar);
        return view("bendahara.home",[
            "title"=>"Beranda Bendahara",
            "total_keluar"=>$total_keluar,
            "total_masuk"=>$total_masuk,
            "total_sisa"=>$total_sisa,
        ]);
    }
    public function donatur(){
        $res = Transaksi::where(["jenis"=>1])->whereNotNull("user_id")->get();
        return view("bendahara.donasi",[
            "title"=>"Data Donasi",
            "data"=>$res
        ]);
    }

    public function donatur_plus(){
        return view("bendahara.donasi_form",[
            "title"=>"Dana Masuk",
            "type"=>1,
            "data"=>null
        ]);
    }

    public function donatur_minus(){
        return view("bendahara.donasi_form",[
            "title"=>"Dana Keluar",
            "type"=>2,
            "data"=>null
        ]);
    }

    public function operasional(){
        $res = Transaksi::where(["status"=>1])->get();
        $masuk = Transaksi::where(["jenis"=>1,"status"=>1])->sum("total");
        $keluar = Transaksi::where(["jenis"=>2,"status"=>1])->sum("total");
        $total_masuk = $masuk;
        $total_keluar = $keluar;
        $total_sisa = $masuk - $keluar;
        return view("bendahara.keuangan",[
            "title"=>"Data Keuangan",
            "data"=>$res,
            "total_masuk"=>$total_masuk,
            "total_keluar"=>$total_keluar,
            "total_sisa"=>$total_sisa
        ]);
    }

    public function laporan(){
        return view("bendahara.laporan",[
            "title"=>"Laporan",
            "data"=>null
        ]);
    }
}
