<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiswaController extends Controller
{
    //
    public function viewData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        $data = \DB::select("SELECT * FROM vsiswa");
        $data_kelas = \DB::select("SELECT * FROM kelas");

        return view("admin.siswa.data", [
            "data_siswa" => $data,
            "data_kelas" => $data_kelas
        ]);
    }

    public function insertData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        \DB::insert("INSERT INTO siswa VALUES ('$req->nis', '$req->nama', '$req->jk', '$req->alamat', '$req->password', '$req->id_kelas')");

        return redirect()->route("admin.data-siswa");
    }

    public function viewEdit(Request $req, $nis) {
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        $data = \DB::select("SELECT * FROM siswa WHERE nis='$nis'");
        $data_kelas = \DB::select("SELECT * FROM kelas");

        return view("admin.siswa.edit", [
            "data_siswa" => $data[0],
            "data_kelas" => $data_kelas
        ]);
    }

    public function editData(Request $req){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        \DB::update("UPDATE siswa SET nama='$req->nama', jk='$req->jk', alamat='$req->alamat', password='$req->password', id_kelas='$req->id_kelas' WHERE nis='$req->nis'");

        return redirect()->route("admin.data-siswa");
    }

    public function deleteData(Request $req, $nis){
        $role_check = $req->session()->get("role");

        if(!$req->session()->has("user") || $role_check !== "admin"){
            return redirect()->route("view.admin.login");
        }

        \DB::delete("DELETE FROM siswa WHERE nis='$nis'");
        return redirect()->route("admin.data-siswa");
    }
}
