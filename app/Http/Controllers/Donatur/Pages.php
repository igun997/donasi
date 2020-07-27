<?php

namespace App\Http\Controllers\Donatur;

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
        $total_sisa = $masuk - $keluar;
        return view("donatur.home",[
            "title"=>"Beranda Donatur",
            "total_keluar"=>$total_keluar,
            "total_masuk"=>$total_masuk,
            "total_sisa"=>$total_sisa,
        ]);
    }
    public function donasi_upload(Request $req,$id){
        return view("donatur.donasi_upload",[
            "title"=>"Upload Donasi",
            "data"=>$id,
            "req"=>$req
        ]);
    }
    public function donasi(){
        $res = Transaksi::where(["user_id"=>session()->get("id"),"jenis"=>1])->get();
        return view("donatur.donasi",[
            "title"=>"Data Donasi Saya",
            "data"=>$res
        ]);
    }
    public function donasi_add(){
        return view("donatur.donasi_add",[
            "title"=>"Tambah Donasi"
        ]);
    }
    public function laporan(){
        return view("bendahara.laporan",[
            "title"=>"Laporan",
            "data"=>null,
            "route_name"=>route("laporan.donatur.generate.donatur"),
        ]);
    }
}
