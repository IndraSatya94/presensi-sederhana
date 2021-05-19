<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HalamanController extends Controller
{
    public function index(){
        $halaman = DB::table('halamans')->get();
        dump($halaman);
        return view('Halaman');
    }
}
