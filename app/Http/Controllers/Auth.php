<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class Auth extends Controller
{

    public function page_home(){
        return view("home_front",[
            "title"=>"Selamat Datang "
        ]);
    }
    public function page_login(){
        return view("login",[
            "title"=>"Halaman Login",
        ]);
    }

    public function page_register(){
        return view("register",[
            "title"=>"Halaman Register",
        ]);
    }

    public function verifikasi(Request $req)
    {
        $req->validate([
            "verif"=>"required"
        ]);
        $find = User::where(["id"=>base64_decode($req->verif)]);
        if ($find->count() > 0){
            $find->update(["status"=>1]);
            return redirect(route("login"))->with(["msg"=>"Email Telah Di Verifikasi"]);
        }else{
            return redirect(route("login"))->withErrors(["msg"=>"Invalid Verification"]);
        }

    }
    public function register(Request $req){
        $req->validate([
            "nama"=>"required",
            "username"=>"required|unique:users,username",
            "password"=>"required",
            "email"=>"required|unique:users,email",
            "no_hp"=>"required|unique:users,no_hp",
        ]);

        $level = 0;
        $created = date("Y-m-d");

        $data = $req->all();
        $data["level"] = $level;
        $data["status"] = 0;
        $data["created_at"] = $created;
        $users = User::create($data);

        if ($users){
            $data_mail = [
                "link"=>route("verifikasi",["verif"=>base64_encode($users->id)]),
                "data"=>$data
            ];
            Mail::send("email",$data_mail,function ($msg) use ($data){
                $msg->to($data["email"],$data["nama"])->subject("Email Verifikasi");
                $msg->from("info@rumaisacenter.online","Email Verifikasi");

            });
            return back()->with(["msg"=>"Sukses Simpan , Silahkan Cek Email Anda "]);
        }else{
            return back()->withErrors(["msg"=>"Error Server"]);
        }

    }

    public function logout(){
        session()->flush();
        return redirect("/");
    }

    public function login(Request $req){
        $req->validate([
           "username"=>"required|exists:users,username",
           "password"=>"required|exists:users,password",
        ]);

        $find = User::where(["username" => $req->username,"password" => $req->password,"status"=>1]);
        if ($find->count() > 0){
            session([
               "level"=>$find->first()->level,
               "nama"=>$find->first()->nama,
               "id"=>$find->first()->id,
            ]);
            if ($find->first()->level == 0){
                $pages = "donatur";
            }elseif ($find->first()->level == 1){
                $pages = "sekretaris";

            }elseif ($find->first()->level == 2){
                $pages = "bendahara";
            }elseif ($find->first()->level == 3){
                $pages = "ketua";
            }elseif ($find->first()->level == 4){
                $pages = "pelayanan";
            }elseif ($find->first()->level == 5){
                $pages = "pengabdian";
            }
            return redirect("/".$pages)->with(["msg"=>"Sukses Login"]);
        }else{
            return back()->withErrors(["msg"=>"Data Pengguna Tidak Ditemukan / Belum Di Verifikasi"]);
        }

    }
}
