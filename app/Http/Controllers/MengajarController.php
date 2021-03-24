<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MengajarController extends Controller
{
    //
    public function viewData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        $data = \DB::select("SELECT * FROM vmengajar");
        $data_guru = \DB::select("SELECT * FROM guru");
        $data_kelas = \DB::select("SELECT * FROM kelas");
        $data_mapel = \DB::select("SELECT * FROM mapel");

        return view("admin.mengajar.data", [
            "data_mengajar" => $data,
            "data_guru" => $data_guru,
            "data_kelas" => $data_kelas,
            "data_mapel" => $data_mapel
        ]);
    }

    public function insertData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        \DB::insert("INSERT INTO mengajar VALUES (null, '$req->nip', '$req->id_mapel', '$req->id_kelas')");

        return redirect()->route("admin.data-mengajar");
    }

    public function viewEdit(Request $req, $id) {
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        $data = \DB::select("SELECT * FROM mengajar WHERE id='$id'");
        $data_guru = \DB::select("SELECT * FROM guru");
        $data_kelas = \DB::select("SELECT * FROM kelas");
        $data_mapel = \DB::select("SELECT * FROM mapel");


        return view("admin.mengajar.edit", [
            "data_mengajar" => $data[0],
            "data_guru" => $data_guru,
            "data_kelas" => $data_kelas,
            "data_mapel" => $data_mapel
        ]);
    }

    public function editData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        \DB::update("UPDATE mengajar SET nip='$req->nip', id_mapel='$req->id_mapel', id_kelas='$req->id_kelas' WHERE id='$req->id'");

        return redirect()->route("admin.data-mengajar");
    }

    public function deleteData(Request $req, $id){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        \DB::delete("DELETE FROM mengajar WHERE id='$id'");
        return redirect()->route("admin.data-mengajar");
    }
}
