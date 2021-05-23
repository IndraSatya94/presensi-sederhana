<?php
  
namespace App\Http\Controllers;
  
use App\Models\Visimisi;
use Illuminate\Http\Request;
  
class VisimisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visimisi = Visimisi::latest()->paginate(5);
    
        return view('visimisi.index',compact('visimisi'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('visimisi.create');
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
    
        Visimisi::create($input);
     
        return redirect()->route('visimisi.index')
                        ->with('success','Visimisi created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Visimisi  $visimisi
     * @return \Illuminate\Http\Response
     */
    public function show(Visimisi $visimisi)
    {
        return view('visimisi.show',compact('visimisi'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Visimisi  $visimisi
     * @return \Illuminate\Http\Response
     */
    public function edit(Visimisi $visimisi)
    {
        return view('visimisi.edit',compact('visimisi'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Visimisi  $visimisi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visimisi $visimisi)
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
          
        $visimisi->update($input);
    
        return redirect()->route('visimisi.index')
                        ->with('success','Visimisi updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Visimisi  $visimisi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Visimisi $visimisi)
    {
        $visimisi->delete();
     
        return redirect()->route('visimisi.index')
                        ->with('success','Visimisi deleted successfully');
    }
}