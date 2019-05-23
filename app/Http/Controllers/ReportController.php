<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Property;
use App\Customer;
use App\Payment;
use App\Agent;
use App\LandLord;
use App\Construction;
class ReportController extends Controller
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
        if(!Auth::user()->role->view_payment){
            return redirect()->back();
        }

        return view('report/index', ['index' => true]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!Auth::user()->role->view_report){
            return redirect()->back();
        }

        $this->validate($request, [
            'from' => 'required|date|before:tomorrow',
            'to' => 'required|date|before:tomorrow',
        ]);

        /*$object = 'Property';
        $attr = 'property_type';
        $value = 'Rent';
        $rents =  $this->get_query_data($request, $object, $attr, $value);*/

        $rents = Property::where([
            ['property_type', 'Rent'],
            ['created_at', '>=', $request['from']],
            ['created_at', '<', \Carbon\Carbon::parse($request['to'])->addDays(1)->format('Y-m-d')],
        ])->count();

        $sold = Property::where([
            ['property_type', 'Sale'],
            ['created_at', '>=', $request['from']],
            ['created_at', '<', \Carbon\Carbon::parse($request['to'])->addDays(1)->format('Y-m-d')],
        ])->count();

        $lease = Property::where([
            ['property_type', 'lease'],
            ['created_at', '>=', $request['from']],
            ['created_at', '<', \Carbon\Carbon::parse($request['to'])->addDays(1)->format('Y-m-d')],
        ])->count();

        $cutomers = Customer::where([
            ['created_at', '>=', $request['from']],
            ['created_at', '<', \Carbon\Carbon::parse($request['to'])->addDays(1)->format('Y-m-d')],
        ])->count();


        $building = Construction::where([
            ['type', 'Building'],
            ['status', 'Incomplete'],
            ['created_at', '>=', $request['from']],
            ['created_at', '<', \Carbon\Carbon::parse($request['to'])->addDays(1)->format('Y-m-d')],
           
        ])->count();

        $maintenance = Construction::where([
            ['type', 'Maintenance'],
            ['status', 'Incomplete'],
            ['created_at', '>=', $request['from']],
            ['created_at', '<', \Carbon\Carbon::parse($request['to'])->addDays(1)->format('Y-m-d')],     
        ])->count();

        $payment = Payment::where([
            ['created_at', '>=', $request['from']],
            ['created_at', '<', \Carbon\Carbon::parse($request['to'])->addDays(1)->format('Y-m-d')],     
        ])->count();

        $agent = Agent::where([
            ['created_at', '>=', $request['from']],
            ['created_at', '<', \Carbon\Carbon::parse($request['to'])->addDays(1)->format('Y-m-d')],     
        ])->count();

        $land_lord = LandLord::where([
            ['created_at', '>=', $request['from']],
            ['created_at', '<', \Carbon\Carbon::parse($request['to'])->addDays(1)->format('Y-m-d')],     
        ])->count();

        $construction = Construction::where([
            ['created_at', '>=', $request['from']],
            ['created_at', '<', \Carbon\Carbon::parse($request['to'])->addDays(1)->format('Y-m-d')],     
        ])->count();

        //dd($building);
        return view('report/index', [
            
            'from' => $request['from'],
            'to' => $request['to'],
            'rents' => $rents, 
            'sold' => $sold, 
            'lease' => $lease,
            'cutomers' => $cutomers,
            'building' => $building,
            'maintenance' => $maintenance,
            'payment' => $payment,
            'agent' => $agent,
            'land_lord' => $land_lord,
            'construction' => $construction
            ]);
    }

    /* The function for getting data from a specific query
     * and return the value for reporting
     */
    public function get_query_data(Request $request, $object, $attribute, $value)
    {
        if(!Auth::user()->role->view_payment){
            return redirect()->back();
        }
        $result = $object::where([
            [$attribute, $value],
            ['created_at', '>=', $request['from']],
            ['created_at', '<', \Carbon\Carbon::parse($request['to'])->addDays(1)->format('Y-m-d')],
        ])->count();

        return $result;
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
