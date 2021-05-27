<?php

namespace App\Http\Controllers;

use App\Models\Sejarah;
use Illuminate\Http\Request;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sejarah = Sejarah::latest()->paginate(5);
    
        return view('sejarah.index',compact('sejarah'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sejarah.create');
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'body' => 'required',
            'tentang' => 'required',
            'detail' => 'required',
        ]);
  
        $input = $request->all();
  
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
    
        sejarah::create($input);
     
        return redirect()->route('sejarah.index')
                        ->with('success','Sejarah Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function show(Sejarah $sejarah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function edit(Sejarah $sejarah)
    {
        return view('sejarah.edit',compact('sejarah'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sejarah $sejarah)
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
          
        $sejarah->update($input);
    
        return redirect()->route('sejarah.index')
                        ->with('success','sejarah Berhasil Diupdate !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sejarah  $sejarah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sejarah $sejarah)
    {
        $sejarah->delete();

        return redirect()->route('sejarah.index')
                        ->with('success', 'sejarah Berhasil Dihapus !');
    }
}
