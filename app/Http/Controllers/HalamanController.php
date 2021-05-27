<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use App\Models\Visimisi;

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
        $visimisi = Visimisi::latest()->paginate(5);
        return view('bolmongkab/detail/visimisi',compact('visimisi'));
    }
    public function sejarah(){
        return view('bolmongkab/detail/sejarah');
    }
    public function wakilbupati(){
        return view('bolmongkab/detail/wakilbupati');
    }
    public function sekretariat(){
        return view('bolmongkab/detail/sekretariat');
    }
    public function dinas(){
        return view('bolmongkab/detail/dinas');
    }
    public function badandaerah(){
        return view('bolmongkab/detail/badandaerah');
    }
    public function kecamatan(){
        return view('bolmongkab/detail/kecamatan');
    }
    public function desa(){
        return view('bolmongkab/detail/desa');
    }
    public function puskesmas(){
        return view('bolmongkab/detail/puskesmas');
    }
}
