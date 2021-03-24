<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route("view.admin.login");
});


// Admin
Route::get("/admin/login" , "LogController@viewAdminLogin")->name("view.admin.login");
Route::post("/admin/login", "LogController@loginAdmin")->name("admin.login");
Route::get("/admin/home", "HomeController@viewAdmin")->name("admin.home");


// Admin(Jurusan)
Route::get("/admin/data-jurusan", "JurusanController@viewData")->name("admin.data-jurusan");
Route::get("/admin/edit-jurusan/{id}", "JurusanController@viewEdit")->name("view.admin.edit-jurusan");
Route::post("/admin/edit-jurusan", "JurusanController@editData")->name("admin.edit-jurusan");
Route::post("/admin/tambah-jurusan", "JurusanController@insertData")->name("admin.tambah-jurusan");
Route::get("/admin/hapus-jurusan/{id}", "JurusanController@deleteData")->name("admin.hapus-jurusan");

// Admin(Kelas)
Route::get("/admin/data-kelas", "KelasController@viewData")->name("admin.data-kelas");
Route::get("/admin/edit-kelas/{id}", "KelasController@viewEdit")->name("view.admin.edit-kelas");
Route::post("/admin/edit-kelas", "KelasController@editData")->name("admin.edit-kelas");
Route::post("/admin/tambah-kelas", "KelasController@insertData")->name("admin.tambah-kelas");
Route::get("/admin/hapus-kelas/{id}", "KelasController@deleteData")->name("admin.hapus-kelas");


// Admin (guru)
Route::get("/admin/data-guru", "GuruController@viewData")->name("admin.data-guru");
Route::get("/admin/edit-guru/{nip}", "GuruController@viewEdit")->name("view.admin.edit-guru");
Route::post("/admin/edit-guru", "GuruController@editData")->name("admin.edit-guru");
Route::post("/admin/tambah-guru", "GuruController@insertData")->name("admin.tambah-guru");
Route::get("/admin/hapus-guru/{nip}", "GuruController@deleteData")->name("admin.hapus-guru");

// Admin (Mapel)
Route::get("/admin/data-mapel", "MapelController@viewData")->name("admin.data-mapel");
Route::get("/admin/edit-mapel/{id}", "MapelController@viewEdit")->name("view.admin.edit-mapel");
Route::post("/admin/edit-mapel", "MapelController@editData")->name("admin.edit-mapel");
Route::post("/admin/tambah-mapel", "MapelController@insertData")->name("admin.tambah-mapel");
Route::get("/admin/hapus-mapel/{id}", "MapelController@deleteData")->name("admin.hapus-mapel");

// Admin (Mapel)
Route::get("/admin/data-mengajar", "MengajarController@viewData")->name("admin.data-mengajar");
Route::get("/admin/edit-mengajar/{id}", "MengajarController@viewEdit")->name("view.admin.edit-mengajar");
Route::post("/admin/edit-mengajar", "MengajarController@editData")->name("admin.edit-mengajar");
Route::post("/admin/tambah-mengajar", "MengajarController@insertData")->name("admin.tambah-mengajar");
Route::get("/admin/hapus-mengajar/{id}", "MengajarController@deleteData")->name("admin.hapus-mengajar");

// Admin (Siswa)
Route::get("/admin/data-siswa", "SiswaController@viewData")->name("admin.data-siswa");
Route::get("/admin/edit-siswa/{nis}", "SiswaController@viewEdit")->name("view.admin.edit-siswa");
Route::post("/admin/edit-siswa", "SiswaController@editData")->name("admin.edit-siswa");
Route::post("/admin/tambah-siswa", "SiswaController@insertData")->name("admin.tambah-siswa");
Route::get("/admin/hapus-siswa/{nis}", "SiswaController@deleteData")->name("admin.hapus-siswa");

// Gurun
Route::get("/guru/login", "LogController@viewGuruLogin")->name("view.guru.login");
Route::post("guru/login", "LogController@loginGuru")->name("guru.login");
Route::get("/guru/home", "HomeController@viewGuru")->name("guru.home");

// Guru (Nilai)
Route::get("/guru/data-nilai", "NilaiController@viewData")->name("guru.data-nilai");
Route::post("/guru/tambah-nilai", "NilaiController@insertData")->name("guru.tambah-nilai");
Route::get("/guru/tambah-nilai/{id}", "NilaiController@viewInsert")->name("view.guru.tambah-nilai");
Route::get("/guru/edit-nilai/{id}", "NilaiController@viewEdit")->name("view.guru.edit-nilai");
Route::post("/guru/edit-nilai", "NilaiController@editData")->name("guru.edit-nilai");
Route::get("/guru/hapus-nilai/{id}", "NilaiController@deleteData")->name("guru.hapus-nilai");

// Siswa
Route::get("/siswa/login", "LogController@viewSiswaLogin")->name("view.siswa.login");
Route::post("/siswa/login", "LogController@loginSiswa")->name("siswa.login");
Route::get("/siswa/home", "HomeController@viewSiswa")->name("siswa.home");

Route::get("/siswa/data-nilai", "NilaiSiswaController@viewData")->name("siswa.data-nilai");

Route::get("/logout", "LogController@logout")->name("logout");