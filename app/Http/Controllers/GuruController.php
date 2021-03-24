<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuruController extends Controller
{
    //
    public function viewData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route('view.admin.login');
        }

        $data = \DB::select("SELECT * FROM guru");

        return view("admin.guru.data", [
            "data_guru" => $data
        ]);
    }

    public function insertData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route('view.admin.login');
        }

        \DB::insert("INSERT INTO guru VALUES ('$req->nip', '$req->nama', '$req->jk', '$req->alamat', '$req->password')");

        return redirect()->route('admin.data-guru');
    }

    public function viewEdit(Request $req, $nip) {
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route('view.admin.login');
        }

        $data = \DB::select("SELECT * FROM guru WHERE nip='$nip'");

        return view("admin.guru.edit", [
            "data_guru" => $data[0]
        ]);
    }

    public function editData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route('view.admin.login');
        }

        \DB::update("UPDATE guru SET nama='$req->nama', jk='$req->jk', alamat='$req->alamat', password='$req->password' WHERE nip='$req->nip'");

        return redirect()->route('admin.data-guru');
    }

    public function deleteData(Request $req, $nip){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route('view.admin.login');
        }

        \DB::delete("DELETE FROM guru WHERE nip='$nip'");
        return redirect()->route('admin.data-guru');
    }
}
