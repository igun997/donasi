<?php

namespace App\Http\Controllers\Sekretaris;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;

class Pages extends Controller
{
    public function home(){
        $total = User::where(["level"=>0,"status"=>0])->count();
        $verified = User::where(["level"=>0,"status"=>1])->count();
        $tolak = User::where(["level"=>0,"status"=>2])->count();
        return view("sekretaris.home",[
            "title"=>"Beranda Sekretaris",
            "total"=>$total,
            "verified"=>$verified,
            "tolak"=>$tolak,
        ]);
    }
    public function donatur(){
        $data = User::where(["level"=>0])->get();
        return view("sekretaris.donatur",[
            "title"=>"Data Donatur",
            "data"=>$data
        ]);
    }

    public function category(){
        $data = Category::all();
        return view("sekretaris.category",[
            "title"=>"Data Kategori",
            "data"=>$data
        ]);
    }



    public function category_add(){
        return view("sekretaris.category_form",[
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
            return view("sekretaris.category_form",[
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
        return view("sekretaris.kegiatan",[
            "title"=>"Data Kegiatan",
            "data"=>$data
        ]);
    }

    public function kegiatan_add(){
        return view("sekretaris.kegiatan_form",[
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
            return view("sekretaris.kegiatan_form",[
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
            return view("sekretaris.kegiatan_detail",[
                "title"=>$data->first()->nama,
                "data"=>$data
            ]);
        }else{
            return back()->withErrors(["msg"=>"Data Tidak Ditemukan"]);
        }
    }
}
