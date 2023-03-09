<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();
        return view('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('customers.create');
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
            //'Customer'     => 'image',
            'night'        => 'required|string',
            'id_card'      => 'required|string|min:0',
            'name'         => 'required|string|min:0', 
            'address'      => 'required|string|min:0',
            'neighborhood' => 'required|string',
            'city'         => 'required|string', 
            'choreo'       => 'required|email',
            'phone'        => 'required|integer|min:7|max:10'
   
           ]);
   
           $customer  = new Customer();
           $customer->night        = $request->night;
           $customer->id_card      = $request->id_card;
           $customer->name         = $request->name;
           $customer->address      = $request->address;
           $customer->neighborhood = $request->neighborhood;
           $customer->city         = $request->city;
           $customer->choreo       = $request->choreo;
           $customer->phone        = $request->phone;

          if($request->hasFile("customer"))
          {
            $customer_file             = $request->file("customer");
            $customer_name             = $customer_file->getClientOriginalName();
            $route                     = public_path("photos");
            $customer_file->move($route,$customer_name);
            $customer->image           = $customer_name;            
          } $customer->save();
          
           return redirect()->route('customers.index'); 
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
        $customer = Customer::find($id);
        
        return view('customers.edit',compact('customer'));
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
            //'customer'     => 'image',
            'night'        => 'required|string',
            'id_card'      => 'required|string',
            'name'         => 'required|string',
            'address'      => 'required|string',
            'neighborhood' => 'required|string',
            'city'         => 'required|string',
            'choreo'       => 'required|email',
            'phone'        => 'required|min:7|max:10'
        ]);
        
        $customer = Customer::find($id);
        $customer-> night       = $request->input('night');
        $customer->id_card      = $request->input('id_card');
        $customer->name         = $request->input('name');
        $customer->address      = $request->input('address');
        $customer->neighborhood = $request->input('neighborhood');
        $customer->city         = $request->input('city');
        $customer->choreo       = $request->input('choreo');
        $customer->phone        = $request->input('phone');
        $customer->update();

        return redirect()->route('customers.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        
        return redirect()->route('customers.index');
    }
}
