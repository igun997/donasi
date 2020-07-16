<?php

namespace App\Http\Controllers\Sekretaris;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class System extends Controller
{
    public function donatur_verifikasi(Request $req,$id,$status){
        $find = User::where(["id"=>$id]);
        if ($find->count() > 0){
            $a = $find->update(["status"=>$status]);
            if ($a){
                return back()->with(["msg"=>"Data Diupdate"]);
            }else{
                return back()->withErrors(["msg"=>"Gagal"]);
            }
        }else{
            return back()->withErrors(["msg"=>"Data Tidak Ditemukan"]);
        }
    }


}
