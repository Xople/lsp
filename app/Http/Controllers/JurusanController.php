<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JurusanController extends Controller
{
    //
    public function viewData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        $data = \DB::select("SELECT * FROM jurusan");

        return view("admin.jurusan.data", [
            "data_jurusan" => $data
        ]);
    }

    public function insertData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        \DB::insert("INSERT INTO jurusan VALUES (null, '$req->nama')");

        return redirect()->route("admin.data-jurusan");
    }

    public function viewEdit(Request $req, $id) {
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        $data = \DB::select("SELECT * FROM jurusan WHERE id='$id'");

        return view("admin.jurusan.edit", [
            "data_jurusan" => $data[0]
        ]);
    }

    public function editData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        \DB::update("UPDATE jurusan SET nama='$req->nama' WHERE id='$req->id'");

        return redirect()->route("admin.data-jurusan");
    }

    public function deleteData(Request $req, $id){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        \DB::delete("DELETE FROM jurusan WHERE id='$id'");
        return redirect()->route("admin.data-jurusan");
    }
}
