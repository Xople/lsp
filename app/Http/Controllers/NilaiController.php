<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiController extends Controller
{
    //
    public function viewData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "guru"){
            return redirect()->route("view.guru.login");
        }

        $nip = $req->session()->get("user");

        $data = \DB::select("SELECT * FROM vnilai");
        $data_mengajar = \DB::select("SELECT * FROM vmengajar WHERE nip='$nip'");

        return view("guru.nilai.data", [
            "data_nilai" => $data,
            "data_mengajar" => $data_mengajar
        ]);
    }

    public function viewInsert(Request $req, $id){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "guru"){
            return redirect()->route("view.guru.login");
        }

        $nip = $req->session()->get("user");

        $data_mengajar = \DB::select("SELECT * FROM mengajar WHERE id='$id'")[0];
        $data_siswa = \DB::select("SELECT * FROM siswa WHERE id_kelas='$data_mengajar->id_kelas'");
        $data_vmengajar = \DB::select("SELECT * FROM vmengajar WHERE nip='$nip' && id='$data_mengajar->id'");

        return view("guru.nilai.tambah", [
            "data_siswa" => $data_siswa,
            "data_mengajar" => $data_vmengajar
        ]);
    }

    public function insertData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "guru"){
            return redirect()->route("view.guru.login");
        }

        $na = ($req->uh + $req->uts + $req->uas) / 3;
        $na = number_format($na, 2);

        \DB::insert("INSERT INTO nilai VALUES (null, '$req->uh','$req->uts','$req->uas','$na','$req->id_mengajar','$req->nis')");

        return redirect()->route("guru.data-nilai");
    }

    public function viewEdit(Request $req, $id) {
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "guru"){
            return redirect()->route("view.guru.login");
        }

        $data = \DB::select("SELECT * FROM vnilai WHERE id='$id'");

        return view("guru.nilai.edit", [
            "data_nilai" => $data[0]
        ]);
    }

    public function editData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "guru"){
            return redirect()->route("view.guru.login");
        }

        $na = ($req->uh + $req->uts + $req->uas) / 3;
        $na = number_format($na, 2);

        \DB::update("UPDATE nilai SET uh='$req->uh', uts='$req->uts', uas='$req->uas', na='$na'  WHERE id='$req->id'");

        return redirect()->route("guru.data-nilai");
    }

    public function deleteData(Request $req, $id){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "guru"){
            return redirect()->route("view.guru.login");
        }

        \DB::delete("DELETE FROM nilai WHERE id='$id'");
        return redirect()->route("guru.data-nilai");
    }
}
