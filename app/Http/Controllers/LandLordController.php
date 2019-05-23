<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LandLord;
use App\Property;
use App\Agent;
use App\Customer;
class LandLordController extends Controller
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
        $land_lords = LandLord::all();
        $properties = Property::all();
        //dd($properties);


        return view('land_lord/index',['land_lords' => $land_lords, 'properties' => $properties,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $properties = Property::all();
        return view('land_lord/create',['properties' => $properties]);
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
            'fname' => 'required|string|max:255',
            'mname',
            'lname' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|email|max:255|unique:land_lords',
            'address' => 'required',
            'kin_name' => 'required|string|max:255',
            'relationship' => 'equired|string|max:255',
            'kin_number' => 'required',
            'property_id' =>'required|exists:properties,id',

          ]);
        LandLord::create($request->all());
        return redirect()->route('land_lord.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $land_lord = LandLord::find($id);

        $agents = Agent::all();
        $properties = Property::all();
        $customers = Customer::all();
        return view('land_lord.show', [
            'land_lord' => $land_lord, 'agents' => $agents,
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
        $properties = Property::all();
        $land_lords = LandLord::find($id);

        return view('land_lord.edit', [
            'land_lords' => $land_lords, 'properties' => $properties,
        ]);
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
            'fname' => 'required|string|max:255',
            'mname',
            'lname' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|email|max:255|unique:land_lords',
            'address' => 'required',
            'kin_name' => 'required|string|max:255',
            'relationship' => 'equired|string|max:255',
            'kin_number' => 'required',
            'property_id' =>'required|exists:properties,id',

          ]);
          LandLord::find($id)->update($request->all());
        return redirect()->route('land_lord.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        LandLord::find($id)->delete();

        redirect(route('land_lord.index'));
    }
}
