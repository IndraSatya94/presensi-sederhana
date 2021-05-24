<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HalamanController;
//crud
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\VisimisiController;

//akhir crud


Route::get('/', function () {
    return view('welcome');
});



route::post('/simpanregistrasi',[LoginController::class,'simpanregistrasi'])->name('simpanregistrasi');
route::get('/login',[LoginController::class,'halamanlogin'])->name('login');
route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');
route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth','ceklevel:admin,operator']], function () {
    route::get('/home',[HomeController::class,'index'])->name('home');
    route::get('/halaman',[HalamanController::class,'index'])->name('halaman');

    route::get('/registrasi',[LoginController::class,'registrasi'])->name('registrasi');    
    //crud
    Route::resource('menus', MenuController::class);
    Route::resource('visimisi', VisimisiController::class);
    // akhir crud
});

