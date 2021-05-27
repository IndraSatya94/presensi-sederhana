<?php

namespace App\Http\Controllers;

use App\Models\Sekda;
use Illuminate\Http\Request;

class SekdaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sekda = Sekda::latest()->paginate(5);
    
        return view('sekda.index',compact('sekda'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sekda.create');
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
    
        Sekda::create($input);
     
        return redirect()->route('sekda.index')
                        ->with('success','Profil Sekda Berhasil Dibuat !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sekda  $sekda
     * @return \Illuminate\Http\Response
     */
    public function show(Sekda $sekda)
    {
        return view('sekda.show',compact('sekda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sekda  $sekda
     * @return \Illuminate\Http\Response
     */
    public function edit(Sekda $sekda)
    {
        return view('sekda.edit',compact('sekda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sekda  $sekda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sekda $sekda)
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
          
        $sekda->update($input);
    
        return redirect()->route('sekda.index')
                        ->with('success','Profil Sekda Berhasil Diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sekda  $sekda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sekda $sekda)
    {
        $sekda->delete();

        return redirect()->route('sekda.index')
                        ->with('success','Profil Sekda Berhasil Dihapus !');
    }
}
