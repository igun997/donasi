<?php

namespace App\Http\Controllers\Pelayanan;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Kegiatan;
use App\Models\KegiatanPartisipan;
use App\Models\User;
use Illuminate\Http\Request;

class Pages extends Controller
{
    public function home(){
        return view("pelayanan.home",[
            "title"=>"Beranda Bid. Pelayanan"
        ]);
    }
    public function donatur(){
        $data = User::where(["level"=>0])->get();
        return view("pelayanan.donatur",[
            "title"=>"Data Donatur",
            "data"=>$data
        ]);
    }

    public function category(){
        $data = Category::all();
        return view("pelayanan.category",[
            "title"=>"Data Kategori",
            "data"=>$data
        ]);
    }



    public function category_add(){
        return view("pelayanan.category_form",[
            "title"=>"Tambah Kategori",
            "data"=>null,
            "route"=>[
                "name"=>"category.insert",
                "params"=>[

                ]
            ]
        ]);
    }

    public function category_update($id){
        $row = Category::where(["id"=>$id]);
        if ($row->count() > 0){
            return view("pelayanan.category_form",[
                "title"=>"Update Kategori",
                "data"=>$row->first(),
                "route"=>[
                    "name"=>"category.update",
                    "params"=>[
                        $id
                    ]
                ]
            ]);
        }else{
            return  back()->withErrors(["msg"=>"Data Tidak Ditemukan"]);
        }
    }

    public function kegiatan(){
        $data = Kegiatan::all();
        return view("pelayanan.kegiatan",[
            "title"=>"Data Kegiatan",
            "data"=>$data
        ]);
    }

    public function kegiatan_add(){
        return view("pelayanan.kegiatan_form",[
            "title"=>"Tambah Kegiatan",
            "data"=>null,
            "route"=>[
                "name"=>"kegiatan.insert",
                "params"=>[

                ]
            ]
        ]);
    }

    public function kegiatan_update(Request $req,$id){
        $row = Kegiatan::where(["id"=>$id]);
        if ($row->count() > 0){
            return view("pelayanan.kegiatan_form",[
                "title"=>"Update Kegiatan",
                "data"=>$row->first(),
                "route"=>[
                    "name"=>"kegiatan.update",
                    "params"=>[
                        $id
                    ]
                ]
            ]);
        }else{
            return  back()->withErrors(["msg"=>"Data Tidak Ditemukan"]);
        }
    }

    public function kegiatan_detail($id){
        $data = Kegiatan::where(["id"=>$id]);
        if ($data->count() > 0){
            return view("pelayanan.kegiatan_detail",[
                "title"=>$data->first()->nama,
                "data"=>$data
            ]);
        }else{
            return back()->withErrors(["msg"=>"Data Tidak Ditemukan"]);
        }
    }

    public function kegiatan_add_partisipan(Request $req,$id){
        $data = KegiatanPartisipan::all();
        $kegiatan = Kegiatan::where(["id"=>$id]);
        if ($kegiatan->count() > 0){
            return view("pelayanan.kegiatan_partisipan",[
                "title"=>$kegiatan->first()->nama." - Partisipan",
                "data"=>$data,
                "id"=>(($req->has("partisipan"))?$req->partisipan:null),
                "kegiatan_id"=>$id,
            ]);
        }else{
            return back()->withErrors(["msg"=>"Data Tidak Ditemukan"]);
        }
    }
}
