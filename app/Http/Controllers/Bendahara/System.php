<?php

namespace App\Http\Controllers\Bendahara;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\User;
use PDF;
use Illuminate\Http\Request;

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

    public function donatur_minus(Request $req){
        $req->validate([
            "total"=>"required",
            "keterangan"=>"required"
        ]);
        $masuk = Transaksi::where(["jenis"=>1,"status"=>1])->sum("total");
        $keluar = Transaksi::where(["jenis"=>2,"status"=>1])->sum("total");
        $total_masuk = $masuk;
        $total_keluar = $keluar;
        $total_sisa = $masuk - $keluar;
        if (($total_sisa - $req->total) < 0){
            return back()->withErrors(["msg"=>"Total Pengeluaran Melebihi Sisa Saldo"]);
        }
        $create_trx = Transaksi::create([
            "total"=>$req->total,
            "created_at"=>date("Y-m-d"),
            "jenis"=>2,
            "bukti"=>null,
            "bukti_upload"=>null,
            "atas_nama"=>null,
            "status"=>1,
            "no_rekening"=>null,
            "tgl_donasi"=>date("Y-m-d"),
            "user_id"=>null,
            "keterangan"=>$req->keterangan
        ]);
        if ($create_trx){
            return  back()->with(["msg"=>"Sukses Simpan Data"]);
        }else{
            return back()->withErrors(["msg"=>"Gagal Simpan Data Transaksi"]);
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
            "level"=>1,
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
                "tgl_donasi"=>date("Y-m-d"),
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

    public function laporan(Request $req){
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
