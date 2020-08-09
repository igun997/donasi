<?php

namespace App\Http\Controllers\Pengabdian;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Kegiatan;
use App\Models\KegiatanDetail;
use App\Models\KegiatanPartisipan;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;
class System extends Controller
{
    public function donasi_verifikasi($id,$status){
        $trx = Transaksi::where(["id"=>$id]);
        if ($trx->count() > 0){
            if ($status == 9){
                $trx->update(["bukti"=>null,"bukti_upload"=>null,"status"=>0,"atas_nama"=>null,"no_rekening"=>null]);
                return back()->with(["msg"=>"Data Direset"]);
            }
            $trx->update(["status"=>$status]);
            return back()->with(["msg"=>"Data Berhasil Di Update"]);

        }else{
            return back()->withErrors(["msg"=>"Data Tidak Ditemukan"]);
        }
    }

    public function donatur_plus(Request $req){
        $req->validate([
            "total"=>"required",
            "nama"=>"required",
            "email"=>"required",
            "alamat"=>"required",
            "no_hp"=>"required",
            "ket"=>"required"
        ]);

        $data = $req->all();

        $create_user = User::create([
            "nama"=>$req->nama,
            "username"=>$req->email,
            "password"=>$req->email,
            "alamat"=>$req->alamat,
            "no_hp"=>$req->no_hp,
            "level"=>0,
            "status"=>1,
            "created_at"=>date("Y-m-d"),
        ]);
        if ($create_user){
            $id = $create_user->id;
            $create_trx = Transaksi::create([
                "total"=>$req->total,
                "created_at"=>date("Y-m-d"),
                "jenis"=>1,
                "bukti"=>null,
                "bukti_upload"=>null,
                "atas_nama"=>null,
                "status"=>1,
                "no_rekening"=>null,

                "tgl_donasi"=>$req->tgl_donasi,
                "user_id"=>$id,
                "keterangan"=>$req->ket
            ]);
            if ($create_trx){
                return  back()->with(["msg"=>"Sukses Simpan Data"]);
            }else{
                return back()->withErrors(["msg"=>"Gagal Simpan Data Transaksi"]);
            }
        }else{
            return back()->withErrors(["msg"=>"Gagal Simpan Data Users"]);
        }
    }
}
