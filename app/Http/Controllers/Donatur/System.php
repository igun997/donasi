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
            "tgl_donasi"=>"required",
        ]);

        $data = $req->all();
        $jenis = 1;
        $status = 0;
        $kegiatan_id = null;
        $user_id = session()->get("id");
        $data["jenis"] = $jenis;
        $data["user_id"] = $user_id;
        $data["status"] = $status;
        $data["keterangan"] = "Donasi Pada ".date("d-m-Y");
        $data["kegiatan_id"] = $kegiatan_id;
        $data["created_at"] = date("Y-m-d");
        $data["tgl_donasi"] = date("Y-m-d",strtotime($req->tgl_donasi));
        $ins = Transaksi::create($data);

        if ($ins){
            return back()->with(["msg"=>"Sukses"]);
        }else{
            return back()->withErrors(["msg"=>"Gagal"]);
        }

    }
    public function donasi_upload(Request $req,$id){
        $find = Transaksi::where(["id"=>$id]);
        if ($find->count() > 0){
            $update_data = [
                "bukti_upload"=>date("Y-m-d",strtotime($req->bukti_upload)),
                "atas_nama"=>$req->atas_nama,
                "no_rekening"=>$req->no_rekening,
            ];
            if ($req->has("bukti")){
                $path = $req->file("bukti")->store("public/bukti");
                $update_data["bukti"] = $path;
            }
            if ($find->update($update_data)){
                return redirect(route("donasi"))->with(["msg"=>"Sukses"]);
            }else{
                return back()->withErrors(["msg"=>"Gagal Upload Data Donasi"]);
            }
        }else{
            return back()->withErrors(["msg"=>"Data Donasi Tidak Ditemukan"]);
        }
    }
}
