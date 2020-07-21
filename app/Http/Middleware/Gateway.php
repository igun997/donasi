<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Event;

class Gateway
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$is_must = null)
    {
        $level = session()->get("level");
        if ($level === NULL || $is_must === NULL){
            Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e){
                $e->menu->add([
                   "text"=>"Login",
                    "url"=>"login",
                    "icon"=>"fa fa-sign-in-alt"
                ]);

                $e->menu->add([
                    "text"=>"Register",
                    "url"=>"register",
                    "icon"=>"fa fa-users"
                ]);
            });
            return $next($request);
        }else{
            if ($is_must == 0){
                Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e){
                    $e->menu->add([
                        "text"=>"Home",
                        "url"=>"donatur",
                        "icon"=>"fa fa-home"
                    ]);

                    $e->menu->add([
                        "text"=>"Donasi",
                        "url"=>"donatur/donasi",
                        "icon"=>"fa fa-file"
                    ]);

//                    $e->menu->add([
//                        "text"=>"Laporan",
//                        "url"=>"donatur/laporan",
//                        "icon"=>"fa fa-file"
//                    ]);

                    $e->menu->add([
                        "text"=>"Logout",
                        "url"=>"logout",
                        "icon"=>"fa fa-sign-out-alt"
                    ]);
                });
            } elseif ($is_must == 1){
                Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e){
                    $e->menu->add([
                        "text"=>"Home",
                        "url"=>"sekretaris",
                        "icon"=>"fa fa-home"
                    ]);

                    $e->menu->add([
                        "text"=>"Data Donatur",
                        "url"=>"sekretaris/donatur",
                        "icon"=>"fa fa-file"
                    ]);

                    $e->menu->add([
                        "text"=>"Data Kategori",
                        "url"=>"sekretaris/category",
                        "icon"=>"fa fa-file"
                    ]);

                    $e->menu->add([
                        "text"=>"Data Kegiatan",
                        "url"=>"sekretaris/kegiatan",
                        "icon"=>"fa fa-file"
                    ]);

                    $e->menu->add([
                        "text"=>"Laporan",
                        "url"=>"sekretaris/laporan",
                        "icon"=>"fa fa-file"
                    ]);

                    $e->menu->add([
                        "text"=>"Logout",
                        "url"=>"logout",
                        "icon"=>"fa fa-sign-out-alt"
                    ]);
                });
            } elseif ($is_must == 2){
                Event::listen("JeroenNoten\LaravelAdminLte\Events\BuildingMenu",function ($e){
                    $e->menu->add([
                        "text"=>"Home",
                        "url"=>"bendahara",
                        "icon"=>"fa fa-home"
                    ]);

                    $e->menu->add([
                        "text"=>"Data Donasi",
                        "url"=>"bendahara/donasi",
                        "icon"=>"fa fa-file"
                    ]);

                    $e->menu->add([
                        "text"=>"Keuangan Keluar / Masuk",
                        "url"=>"bendahara/operasional",
                        "icon"=>"fa fa-file"
                    ]);

                    $e->menu->add([
                        "text"=>"Laporan",
                        "url"=>"bendahara/laporan",
                        "icon"=>"fa fa-file"
                    ]);

                    $e->menu->add([
                        "text"=>"Logout",
                        "url"=>"logout",
                        "icon"=>"fa fa-sign-out-alt"
                    ]);
                });
            } elseif ($is_must == 3){

            }else{

            }

            if ($level == $is_must){
                return $next($request);
            }else{
                return  redirect("/login")->withErrors(["msg"=>"Anda tidak memiliki akses ke halaman ini"]);
            }
        }

    }
}
