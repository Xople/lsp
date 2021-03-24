<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function viewAdmin(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        return view("admin.home", ["user" => $req->session()->get("user")]);
    }
    public function viewGuru(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "guru"){
            return redirect()->route("view.guru.login");
        }

        return view("guru.home", ["user" => $req->session()->get("nama")]);
    }
    public function viewSiswa(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "siswa"){
            return redirect()->route("view.siswa.login");
        }

        $name = $req->session()->get("user");
        $nis = $req->session()->get("nis");

        return view("siswa.home", [
            "user" => $name,
            "nis" => $nis
        ]);
    }
}
