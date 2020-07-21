<?php

namespace App\Http\Controllers\Sekretaris;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Kegiatan;
use App\Models\KegiatanDetail;
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

    public function category_insert(Request $req){
        $req->validate([
            "name"=>"required"
        ]);
        $data = $req->all();
        $data["created_at"] = date("Y-m-d");

        $ins = Category::create($data);
        if ($ins){
            return back()->with(["msg"=>"Sukses Simpan"]);
        }else{
            return back()->withErrors(["msg"=>"Gagal Simpan"]);
        }
    }

    public function category_update(Request $req,$id){
        $req->validate([
            "name"=>"required"
        ]);
        $data = $req->all();
        unset($data["_token"]);
        $ins = Category::where(["id"=>$id])->update($data);
        if ($ins){
            return back()->with(["msg"=>"Sukses Simpan"]);
        }else{
            return back()->withErrors(["msg"=>"Gagal Simpan"]);
        }
    }

    public function category_delete(Request $req,$id){
        Category::find($id)->delete();
        return back()->with(["msg"=>"Sukses"]);
    }

    public function kegiatan_insert(Request $req){
        $req->validate([
            "foto"=>"required",
            "nama"=>"required",
            "ket"=>"required",
            "category_id"=>"required|exists:categories,id"
        ]);
        $images = [];
        if ($req->has("foto")){
            foreach ($req->file("foto") as $index => $item) {
                $path = $item->store("public/kegiatan");
                $images[] = $path;
            }
        }else{
            return response()->json(["code"=>500]);
        }
        $data = $req->all();
        $data["created_at"] = date("Y-m-d");
        $create = Kegiatan::create($data);
        if ($create){
            $id = $create->id;
            foreach ($images as $index => $image) {
                KegiatanDetail::create([
                    "foto"=>$image,
                    "kegiatan_id"=>$id
                ]);
            }
            return back()->with(["msg"=>"Sukses Tambah kegiatan"]);
        }else{
            return back()->withErrors(["msg"=>"Gagal Tambah kegiatan"]);
        }
    }

    public function kegiatan_update(Request $req,$id){
        $req->validate([
            "nama"=>"required",
            "ket"=>"required",
            "category_id"=>"required|exists:categories,id"
        ]);
        $images = [];
        if ($req->has("foto")){
            KegiatanDetail::where(["kegiatan_id"=>$id])->delete();
            foreach ($req->file("foto") as $index => $item) {
                $path = $item->store("public/kegiatan");
                $images[] = $path;
            }
        }
        $data = $req->all();
        $data["created_at"] = date("Y-m-d");
        unset($data["_token"]);
        unset($data["foto"]);
        $create = Kegiatan::where(["id"=>$id])->update($data);
        if ($create){

            foreach ($images as $index => $image) {
                KegiatanDetail::create([
                    "foto"=>$image,
                    "kegiatan_id"=>$id
                ]);
            }
            return back()->with(["msg"=>"Sukses Simpan kegiatan"]);
        }else{
            return back()->withErrors(["msg"=>"Gagal Simpan kegiatan"]);
        }
    }


}
