<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KelasController extends Controller
{
    //
    public function viewData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        $data = \DB::select("SELECT * FROM vkelas");
        $data_jurusan =  \DB::select("SELECT * FROM jurusan");

        return view("admin.kelas.data", [
            "data_kelas" => $data,
            "data_jurusan" => $data_jurusan
        ]);
    }

    public function insertData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        \DB::insert("INSERT INTO kelas VALUES (null, '$req->nama', '$req->id_jurusan')");

        return redirect()->route("admin.data-kelas");
    }

    public function viewEdit(Request $req, $id) {
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        $data = \DB::select("SELECT * FROM kelas WHERE id='$id'");
        $data_jurusan =  \DB::select("SELECT * FROM jurusan");

        return view("admin.kelas.edit", [
            "data_kelas" => $data[0],
            "data_jurusan" => $data_jurusan
        ]);
    }

    public function editData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        \DB::update("UPDATE kelas SET nama='$req->nama', id_jurusan='$req->id_jurusan' WHERE id='$req->id'");

        return redirect()->route("admin.data-kelas");
    }

    public function deleteData(Request $req, $id){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        \DB::delete("DELETE FROM kelas WHERE id='$id'");
        return redirect()->route("admin.data-kelas");
    }
}
