<?php

namespace App\Http\Controllers;

use App\Models\Pimpinan;
use Illuminate\Http\Request;

class PimpinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pimpinan = Pimpinan::latest()->paginate(5);
    
        return view('pimpinan.index',compact('pimpinan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pimpinan.create');
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
            'jabatan' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'linkedin' => 'required',
            // 'twitter' => 'required',
            // 'facebook' => 'required',
            // 'instagram' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        Pimpinan::create($input);
     
        return redirect()->route('pimpinan.index')
                        ->with('success','Pimpinan Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function show(Pimpinan $pimpinan)
    {
        return view ('pimpinan.show',compact('pimpinan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pimpinan $pimpinan)
    {
        return view('pimpinan.edit',compact('pimpinan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pimpinan $pimpinan)
    {
        $request->validate([
            'nama'=>'required',
            'jabatan'=>'required',
            // 'linkedin'=>'required',
            // 'twitter'=>'required',
            // 'facebook'=>'required',
            // 'instagram'=>'required'
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
          
        $pimpinan->update($input);
    
        return redirect()->route('pimpinan.index')
                        ->with('success','Pimpinan Berhasil Diupdate !');

        }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pimpinan $pimpinan)
    {
        $pimpinan->delete();

        return redirect()->route('pimpinan.index')
                        ->with('success', 'Pimpinan Berhasil Dihapus !');
    }
}
