<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiSiswaController extends Controller
{
    public function viewData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "siswa"){
            return redirect()->route("view.siswa.login");
        }

        $nis = $req->session()->get("nis");

        $data = \DB::select("SELECT * FROM vnilai WHERE nis='$nis'");

        return view("siswa.nilai.data", [
            "data_nilai" => $data
        ]);
    }
}
