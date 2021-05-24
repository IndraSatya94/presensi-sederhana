<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HalamanController extends Controller
{
    public function index(){
        $menus = DB::table('menus')->get();
        // dump($halaman);
        return view('admin/Halaman', compact('menus'));
    }
}
