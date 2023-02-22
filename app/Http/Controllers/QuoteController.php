<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Quote;
use App\Models\Accessorie;


class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        //Mostrar los diseños:
        
        $quotes = Quote::all();
        
        return view('quotes.index',compact('quotes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        //Aquì crear el formulario:
        $gauges     = Accessorie::select('id','description')->where('type','=','Chapa')->get();
        $veneers    = Accessorie::select('id','description')->where('type','=','calibre')->get();
        $paintings  = Accessorie::select('id','description')->where('type','=','Pintura')->get();
        $measures   = Accessorie::select('id','description')->where('type','=','Medida')->get();
        $Hinges     = Accessorie::select('id','description')->where('type','=','Visagra')->get();
        $slingshots = Accessorie::select('id','description')->where('type','=','Tiradera')->get();
        $pins       = Accessorie::select('id','description')->where('type','=','Pasador')->get();
        $frames     = Accessorie::select('id','description')->where('type','=','Marco')->get();
        
        return view('quotes.create',compact('gauges','veneers','pins','frames','slingshots','Hinges','measures','paintings'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           $validated = $request->validate([
            'quote' => 'image',
            'price'  => 'required|integer|min:0',
            'title'  => 'required|string|min:0'
   
           ]);
   
           $quote  = new Quote();
           $quote->price  = $request->price;
           $quote->title  = $request->title;

          if($request->hasFile("quote"))
          {
            $quote_file             = $request->file("quote");
            $quote_name             = $quote_file->getClientOriginalName();
            $route                   = public_path("photos");
            $quote_file->move($route,$quote_name);
            $quote->image           = $quote_name;            
          } $quote->save();
          
           return redirect()->route('quotes.index'); 
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
        $quote = Quote::find($id);
        
        return view('quotes.edit',compact('quote'));
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
            'quote' => 'image',
            'price'  => 'required|integer|min:0',
            'title'  => 'required|string|min:0'
        ]);
        
        $quote = Quote::find($id);
        $quote->price     = $request->input('price');
        $quote->title_type = $request->input('title_type');
        $quote->update();

        return redirect()->route('quotes.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quote = Quote::find($id);
        $quote->delete();
        
        return redirect()->route('quotes.index');
    }
}
