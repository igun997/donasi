<?php

namespace App\Http\Controllers\Ketua;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
class System extends Controller
{
    public function kegiatan_verifikasi(Request $req,$id,$status){
        $find = Kegiatan::where(["id"=>$id]);
        if ($find->count() > 0){
            $a = $find->update(["atasan"=>$status]);
            if ($a){
                return back()->with(["msg"=>"Data Diupdate"]);
            }else{
                return back()->withErrors(["msg"=>"Gagal"]);
            }
        }else{
            return back()->withErrors(["msg"=>"Data Tidak Ditemukan"]);
        }
    }
    public function lap_donatur(Request $req){
        $req->validate([
            "start"=>"required",
            "end"=>"required"
        ]);

        $find = User::where(["level"=>0])->where("created_at",">=",$req->start)->where("created_at","<=",$req->end);
        if ($find->count() > 0){
            $data = $find;
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper('a4', 'landscape')->loadView("pdf.donatur",[
                "data"=>$data,
                "req"=>$req
            ]);
            return $pdf->download('donatur_'.time().'.pdf');
        }else{
            return back()->withErrors(["msg"=>"Data Donatur Tidak Ditemukan"]);
        }
    }

    public function lap_keuangan(Request $req){
        $req->validate([
            "start"=>"required",
            "end"=>"required"
        ]);
        $masuk = Transaksi::where(["jenis"=>1,"status"=>1])->where("created_at",">=",$req->start)->where("created_at","<=",$req->end)->sum("total");
        $keluar = Transaksi::where(["jenis"=>2,"status"=>1])->where("created_at",">=",$req->start)->where("created_at","<=",$req->end)->sum("total");
        $total_masuk = $masuk;
        $total_keluar = $keluar;
        $total_sisa = $masuk - $keluar;
        $find = Transaksi::where(["status"=>1])->where("created_at",">=",$req->start)->where("created_at","<=",$req->end);
        if ($find->count() > 0){
            $data = $find;
            $pdf = PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true])->setPaper('a4', 'landscape')->loadView("pdf.keuangan",[
                "data"=>$data,
                "req"=>$req,
                "sisa"=>$total_sisa,
                "masuk"=>$total_masuk,
                "keluar"=>$total_keluar
            ]);
            return $pdf->download('laporan_keuangan_'.time().'.pdf');
        }else{
            return back()->withErrors(["msg"=>"Data Keuangan Tidak Ditemukan"]);
        }
    }
}
