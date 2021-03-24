<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LogController extends Controller
{
    //  
    
    public function viewAdminLogin(Request $req){
        $role_check = $req->session()->get("role");

        if($req->session()->has("user") && $role_check === "admin"){
            return redirect()->route("admin.home");
        }

        return view("admin.login");
    }

    public function viewGuruLogin(Request $req){
        $role_check = $req->session()->get("role");

        if($req->session()->has("user") && $role_check === "guru"){
            return redirect()->route("guru.home");
        }

        return view("guru.login");
    }

    public function viewSiswaLogin(Request $req){
        $role_check = $req->session()->get("role");

        if($req->session()->has("user") && $role_check === "siswa"){
            return redirect()->route("siswa.home");
        }

        return view("siswa.login");
    }

    public function loginAdmin(Request $req){
        $admin = \DB::select(
            "SELECT * FROM admin WHERE username='$req->username' && password='$req->password'"
        );

        if(count($admin) === 0){
            return redirect()->route("view.admin.login");
        }

        session([
            "user" => $admin[0]->username,
            "role" => 'admin'
        ]);

        return redirect("/admin/home");
    }

    public function loginGuru(Request $req){
        $guru = \DB::select(
            "SELECT * FROM guru WHERE nip='$req->nip' && password='$req->password'"
        );

        if(count($guru) === 0){
            return redirect()->route("view.guru.login");
        }

        session([
            "user" => $guru[0]->nip,
            "nama" => $guru[0] ->nama,
            "role" => 'guru'
        ]);

        return redirect("/guru/home");
    }

    public function loginSiswa(Request $req){
        $siswa = \DB::select(
            "SELECT * FROM siswa WHERE nis='$req->nis' && password='$req->password'"
        );

        if(count($siswa) === 0){
            return redirect()->route("view.siswa.login");
        }

        session([
            "user" => $siswa[0]->nama,
            "nis" => $siswa[0]->nis,
            "role" => 'siswa'
        ]);

        return redirect("/siswa/home");
    }


    public function logout(Request $req){
        $role = $req->session()->get("role");

        $req->session()->forget(["user", "role"]);

        if($role === "admin"){
            return redirect()->route("view.admin.login");
        } else if($role === "guru"){
            return redirect()->route("view.guru.login");
        } else {
            return redirect()->route("view.siswa.login");
        }
    }
}
