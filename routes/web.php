<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => ['guest']], function() {
    Route::get("/", "PageController@login")->name('login');
    Route::post("/login", "AuthController@ceklogin");
});

Route::group(['middleware' => ['auth']], function() {
    Route::get("/user", "PageController@formedituser");
    Route::post("/updateuser", "PageController@updateuser");
    Route::get("/logout", "AuthController@ceklogout");
    Route::get("/home", "PageController@home");
    Route::get("/pasien", "PageController@pasien");
    Route::get("/pasien/add-form", "PageController@formaddpasien");
    Route::post("/save", "PageController@savepasien");
    Route::get("/pasien/edit-form/{id}", "PageController@formeditpasien");
    Route::put("/update/{id}", "PageController@updatepasien");
    Route::get("/delete/{id}", "PageController@deletepasien");
});