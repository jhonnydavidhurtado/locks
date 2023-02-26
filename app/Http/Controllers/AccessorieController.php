<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Accessorie;
class AccessorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accessories = Accessorie::all();
        return view('accessories.index',compact('accessories'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $accessories = Accessorie::select('type')
        ->distinct()
        ->orderBy('type','asc')
        ->get();

        return view('accessories.create',compact('accessories'));
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
        //
        $validated = $request->validate([
            'price'       =>'required',
            //'accessorie'  =>'image',
            'type'        =>'required',
            'description' =>'required',
            'type_text'   =>'required_if:type,otro'
   
   
           ]);
   
           $accessorie  = new accessorie();
           $accessorie->price        = $request->price;
           $accessorie->description  = $request->description;

           if( $request->input('type') == 'otro'){
            $accessorie->type = $request->type_text;    
           }else{
            $accessorie->type = $request->type; 
           }

           
       
    
           
          /* 
          if($request->hasFile("accessorie"))
          {
            $accessorie_file         = $request->file("accessorie");
            $accessorie_name         = $accessorie_file->getClientOriginalName();
            $route                   = public_path("photos");
            $accessorie_file->move($route,$accessorie_name);
            $accessorie->image       = $accessorie_name;            
          }*/
   
           $accessorie->save();
          
           return redirect()->route('accessories.index'); 
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
        $accessories = accessorie::find($id);
        return view('accessories.edit',compact('accessories'));
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
            $validate = $request->validate
        ([
            //'accessories'   => 'required|image',
            'price'        => 'required|integer|min:0',
            'description'  => 'required|string|min:0',
            'type'         => 'required|string|min:0'
        ]);
        
        $accessorie = accessorie::find($id);
        $accessorie->price = $request->input('price');
        $accessorie->type  = $request->input('type');
        $accessorie->description = $request->input('description');


        /*
        if($request->hasFile("accessorie"))
        {
          $accessorie_file         = $request->file("accessorie");
          $accessorie_name         = $accessorie_file->getClientOriginalName();
          $route                   = public_path("photos");
          $accessorie_file->move($route,$accessorie_name);
          $accessorie->image       = $accessorie_name;            
        }*/
 

        $accessorie->update();
        return redirect()->route('accessories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $accessorie = accessorie::find($id);
        $accessorie->delete();
        return redirect()->route('accessories.index');
    }
}
