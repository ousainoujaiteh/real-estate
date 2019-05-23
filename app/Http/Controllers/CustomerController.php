<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer;

class CustomerController extends Controller
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
    {   $customers = Customer::all();
        return view('customer/index', ['customers' => $customers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customer/create');
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
        $this->validate($request ,[
            'indentity_name' => 'required',
            'indentity_number' => 'required',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|email|max:255|unique:customers',
            'address' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'deposit' => 'required',
            'type' => 'required'
        ]);

        Customer::create($request->all());
        return redirect()->route('customer.index')->with('success' , 'Customer created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id);

        return view('customer.show', compact('customer'));
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

        return view('customer.edit',compact('customer'));
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
        $this->validate($request ,[
            'indentity_name' => 'required',
            'indentity_number' => 'required',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'phone' => 'required',
            'email' => 'required|string|email|max:255|unique:customers',
            'address' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'deposit' => 'required',
            'type' => 'required'
        ]);

        Customer::find($id)->update($request->all());
        return redirect()->route('customer.index')->with('success' , 'Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Customer::find($id)->delete();
        return redirect()->route('customer.index')->with('success' , 'Customer deleted successfully');
    }
}
