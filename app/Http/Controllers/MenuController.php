<?php
  
namespace App\Http\Controllers;
  
use App\Models\Menu;
use Illuminate\Http\Request;
  
class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::latest()->paginate(5);
    
        return view('menus.index',compact('menus'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menus.create');
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
        ]);
  
        $input = $request->all();
    
        Menu::create($input);
     
        return redirect()->route('menus.index')
                        ->with('success','Menus created successfully.');
    }
     
    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('menus.show',compact('menu'));
    }
     
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
        return view('menus.edit',compact('menu'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'nama' => 'required',
        ]);
  
        $input = $request->all();
          
        $menu->update($input);
    
        return redirect()->route('menus.index')
                        ->with('success','Menu updated successfully');
    }
  
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        $menu->delete();
     
        return redirect()->route('menus.index')
                        ->with('success','Menu deleted successfully');
    }
}