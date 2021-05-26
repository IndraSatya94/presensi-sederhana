<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HalamanController;
//crud
use App\Http\Controllers\VisimisiController;
use App\Http\Controllers\PimpinanController;
use App\Http\Controllers\BupatiController;
use App\Http\Controllers\PuskesmasController;

//akhir crud

//Halaman statis

Route::get('/', function () {
    return view('bolmongkab/index');
});

route::get('/visimisitemp',[halamanController::class,'visimisi']);
route::get('/bupatitemp',[halamanController::class,'bupati']);

//Akhir halaman statis



route::post('/simpanregistrasi',[LoginController::class,'simpanregistrasi'])->name('simpanregistrasi');
route::get('/login',[LoginController::class,'halamanlogin'])->name('login');
route::post('/postlogin',[LoginController::class,'postlogin'])->name('postlogin');
route::get('/logout',[LoginController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth','ceklevel:admin,operator']], function () {
    route::get('/home',[HomeController::class,'index'])->name('home');
    // route::get('/halaman',[HalamanController::class,'index'])->name('halaman');

    route::get('/registrasi',[LoginController::class,'registrasi'])->name('registrasi');    
    //crud
    Route::resource('visimisi', VisimisiController::class);
    Route::resource('bupati', BupatiController::class);
    Route::resource('pimpinan', PimpinanController::class);
    Route::resource('puskesmas', PuskesmasController::class);
    // akhir crud
});

