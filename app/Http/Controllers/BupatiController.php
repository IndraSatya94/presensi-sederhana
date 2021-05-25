<?php

namespace App\Http\Controllers;

use App\Models\Bupati;
use Illuminate\Http\Request;

class BupatiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bupati = Bupati::latest()->paginate(5);
    
        return view('bupati.index',compact('bupati'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bupati.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'body' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Bupati::create($input);
     
        return redirect()->route('bupati.index')
                        ->with('success','Profil Bupati Berhasil Dibuat !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Bupati  $bupati
     * @return \Illuminate\Http\Response
     */
    public function show(Bupati $bupati)
    {
        return view('bupati.show',compact('bupati'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Bupati  $bupati
     * @return \Illuminate\Http\Response
     */
    public function edit(Bupati $bupati)
    {
        return view('bupati.edit',compact('bupati'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Bupati  $bupati
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bupati $bupati)
    {
        $request->validate([
            'nama' => 'required',
            'body' => 'required'
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }else{
            unset($input['image']);
        }
          
        $bupati->update($input);
    
        return redirect()->route('bupati.index')
                        ->with('success','Profil Bupati Berhasil Diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Bupati  $bupati
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bupati $bupati)
    {
        $bupati->delete();

        return redirect()->route('bupati.index')
                        ->with('success','Profil Bupati Berhasil Dihapus !');
    }
}
