<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MapelController extends Controller
{
    //
    public function viewData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        $data = \DB::select("SELECT * FROM mapel");

        return view("admin.mapel.data", [
            "data_mapel" => $data
        ]);
    }

    public function insertData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        \DB::insert("INSERT INTO mapel VALUES (null, '$req->nama')");

        return redirect()->route("admin.data-mapel");
    }

    public function viewEdit(Request $req, $id) {
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        $data = \DB::select("SELECT * FROM mapel WHERE id='$id'");

        return view("admin.mapel.edit", [
            "data_mapel" => $data[0]
        ]);
    }

    public function editData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        \DB::update("UPDATE mapel SET nama='$req->nama' WHERE id='$req->id'");

        return redirect()->route("admin.data-mapel");
    }

    public function deleteData(Request $req, $id){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        \DB::delete("DELETE FROM mapel WHERE id='$id'");
        return redirect()->route("admin.data-mapel");
    }
}
