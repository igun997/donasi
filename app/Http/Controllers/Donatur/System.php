<?php

namespace App\Http\Controllers\Donatur;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class System extends Controller
{

    public function donasi_insert(Request $req){

        $req->validate([
            "total"=>"required|numeric",
            "bukti"=>"required|mimes:jpg,png,gif"
        ]);

        $data = $req->all();
        $jenis = 1;
        $status = 0;
        $kegiatan_id = null;
        $user_id = session()->get("id");
        $data["jenis"] = $jenis;
        $data["user_id"] = $user_id;
        $data["status"] = $status;
        $data["keterangan"] = "";
        $data["kegiatan_id"] = $kegiatan_id;
        $data["created_at"] = date("Y-m-d");
        if ($req->has("bukti")){
            $path = $req->file("bukti")->store("public/bukti");
            $data["bukti"] = $path;
        }
        $ins = Transaksi::create($data);

        if ($ins){
            return back()->with(["msg"=>"Sukses"]);
        }else{
            return back()->withErrors(["msg"=>"Gagal"]);
        }

    }
}
