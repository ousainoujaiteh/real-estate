<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agent;
use App\Property;
use App\Customer;
class AgentController extends Controller
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
        $agents = Agent::all();
        return view('agent/index', ['agents' => $agents]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agent/create');
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
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required|string|email|max:255|unique:agents',
            'type' => 'required',
        ]);

        Agent::create($request->all());
        return redirect()->route('agent.index')->with('success' , 'Agent created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $agent = Agent::find($id);
        $agents = Agent::all();
        $properties = Property::all();
        $customers = Customer::all();
        return view('agent.show', [
            'agent' => $agent, 'agents' => $agents,
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
        $agent = Agent::find($id);
        return view('agent.edit', ['agent' => $agent]);
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
            'fname' => 'required',
            'mname',
            'lname' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'type' => 'required',
        ]);

        Agent::find($id)->update($request->all());
        return redirect()->route('agent.index')->with('success' , 'Agent updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agent::find($id)->delete();
        return redirect()->route('agent.index')->with('success' , 'Agent deleted successfully');
    }
}
