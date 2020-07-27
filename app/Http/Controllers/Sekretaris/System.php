<?php

namespace App\Http\Controllers\Sekretaris;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Kegiatan;
use App\Models\KegiatanDetail;
use App\Models\KegiatanPartisipan;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
class System extends Controller
{

    public function kegiatan_verifikasi(Request $req,$id,$status){
        $find = Kegiatan::where(["id"=>$id]);
        if ($find->count() > 0){
            $a = $find->update(["sekretaris"=>$status]);
            if ($a){
                return back()->with(["msg"=>"Data Diupdate"]);
            }else{
                return back()->withErrors(["msg"=>"Gagal"]);
            }
        }else{
            return back()->withErrors(["msg"=>"Data Tidak Ditemukan"]);
        }
    }

    public function cetak_donatur(Request $req){
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


}
