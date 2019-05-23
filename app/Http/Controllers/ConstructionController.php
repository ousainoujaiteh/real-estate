<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Construction;
use App\Customer;
use App\Agent;
use App\Property;
class ConstructionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $constructions = Construction::all();
        $customers = Customer::all();
        return view('construction/index',[
            'constructions' => $constructions, 'customers' => $customers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $customers = Customer::all();
        return view('construction/create',[ 'customers' => $customers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'type' => 'required',
            'cost' => 'required',
            'details' => 'required',  
            'worker_name' => 'required',
            'worker_type' => 'required',
            'work_type' => 'required',
            'status' => 'required',
            'start_date' => 'required|date',
            'end_date',
            'location' => 'required',
            'customer_id',
        ]);
        Construction::create($request->all());
        return redirect()->route('construction.index')->with('success' , 'Construction created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $construction = Construction::find($id);
        $agents = Agent::all();
        $properties = Property::all();
        $customers = Customer::all();
        return view('construction.show', [
            'construction' => $construction, 'agents' => $agents,
            'properties' => $properties, 'customers' => $customers,
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $construction = Construction::find($id);
        $customers = Customer::all();

        return view('construction.edit', ['construction' => $construction, 'customers' => $customers]);
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
        $this->validate($request,[
            'type' => 'required',
            'cost' => 'required',
            'details' => 'required',  
            'worker_name' => 'required',
            'worker_type' => 'required',
            'work_type' => 'required',
            'status' => 'required',
            'start_date' => 'required|date',
            'end_date',
            'location' => 'required',
            'customer_id',
        ]);
        Construction::find($id)->update($request->all());
        return redirect()->route('construction.index')->with('success' , 'Construction updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      Construction::find($id)->delete();
      return redirect(route('construction.index'));
    }
}
