<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Design;
use App\Models\Accessorie;

class DesignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        
        //Mostrar los diseños:
        $designs = Design::select(
        'designs.id','image','designs.price','title',
        't1.type as type_frame','t1.description as description_frame','t1.price as price_frame',
        't2.type as type_veneer','t2.description as description_veneer','t2.price as price_veneer')
        ->leftJoin('accessories as t1','t1.id','designs.frame')
        ->leftJoin('accessories as t2','t2.id','designs.veneer')
        ->get();
        
        return view('designs.index',compact('designs'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Aquì crear el formulario:
        $veneers     = Accessorie::select('id','description')->where('type','=','Chapa')->get();
        $frames     = Accessorie::select('id','description')->where('type','=','Marco')->get();

        return view('designs.create',compact('veneers','frames'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $validated = $request->validate([
            'design' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'price'  => 'required|integer|min:0', 
            'title'  => 'required|string|min:0',
            'frame'  => 'nullable|integer|min:1',
            'veneers'=> 'nullable|integer|min:1', 
        ]);

        $design  = new Design();
        $design->price  = $request->price;
        $design->title  = $request->title;

        if( $request->frame != null )
        {
            $design->frame  = $request->frame;
        }
       
        if( $request->veneer != null )
        {
            $design->veneer  = $request->veneer;
        }

       if($request->hasFile("design"))
       {
         $design_file             = $request->file("design");
         $design_name             = $design_file->getClientOriginalName();
         $route                   = public_path("photos");
         $design_file->move($route,$design_name);
         $design->image           = $design_name;            
       } $design->save();
       
        return redirect()->route('designs.index'); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //designs/2/edit
        $design = Design::find($id);

        $veneers = Accessorie::select('id','description')->where('type','=','Chapa')->get();
        $frames  = Accessorie::select('id','description')->where('type','=','Marco')->get();
       
        return view('designs.edit',compact('design','veneers','frames'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $validate = $request->validate
        ([
            'design' => 'image|mimes:jpeg,png,jpg|max:2048',
            'price'  => 'required|integer|min:0',
            'title'  => 'required|string|min:0',
            'frame'  => 'required|integer',
            'veneer' => 'required|integer'
        ]);
        
        $design = Design::find($id);
        $design->price = $request->input('price');
        $design->title =$request->input('title');
        $design->frame =$request->input('frame');
        $design->veneer =$request->input('veneer');

        if($request->hasFile("design"))
        {
          $design_file             = $request->file("design");
          $design_name             = $design_file->getClientOriginalName();
          $route                   = public_path("photos");
          $design_file->move($route,$design_name);
          $design->image           = $design_name;            
        } $design->update();

        return redirect()->route('designs.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $design = Design::find($id);
        $design->delete();
        
        return redirect()->route('designs.index');
    }
}
