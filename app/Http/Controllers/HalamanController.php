<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HalamanController extends Controller
{
    // public function index(){
    //     $menus = DB::table('menus')->get();
    //     return view('admin/Halaman', compact('menus'));
    // }

    public function bupati(){
        return view('bolmongkab/detail/bupati');
    }
    public function visimisi(){
        return view('bolmongkab/detail/visimisi');
    }
}
