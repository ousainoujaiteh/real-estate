<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Property;
use App\Payment;
use App\Customer;
use App\Agent;
use DB;
use PDF;
class PropertyController extends Controller
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
        $properties = Property::all();
        $payments  = Payment::all();
        $agents = Agent::all();
        $customers = Customer::all();

        return view('property/index',[
            'properties' => $properties, 'payments' => $payments,
             'agents' => $agents, 'customers' => $customers,
        ]);
    }

    public function get_payment_total($id){
        
        $property = Property::find($id);
        $total = 0;
        foreach($property->payment as $payment){
            $total += $payment->amount;
        }
        return $total;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $customers = Customer::all();
        $agents = Agent::all();
        return view('property/create', [
            'customers' => $customers, 'agents' => $agents
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $atr = [];
        if ($request['key'] != null){
            for($i = 0; count($request['key']) < $i; $i++){
                $atr[$request['key'][$i]] = $request['value'][$i];

            }
        }

        $request['attributes'] = collect($atr)->toJson();

        $this->validate($request ,[
            'property_no' => 'required',
            'property_name' => 'required',
            'property_type' => 'required',
            'location' => 'required',
            'plot_no' => 'required',
            'size' => 'required',
            'price' => 'required',
            'due_date' => 'required',
            'cusotmer_id',
            'agent_id',
            'attributes',
          ]);
        Property::create($request->all());
        return redirect()->route('property.index')->with('success' , 'Property created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $property = Property::find($id);

        $properties = Property::all();

        $customers = Customer::all();

        $agents = Agent::all();
       


        return view('property.show', [
            'property' => $property,  'balance' => $property->balance(),
            'properties' => $properties, 'customers' => $customers, 'agents' => $agents
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
        $property = Property::find($id);
        $customers = Customer::all();
        $agents = Agent::all();
        return view('property.edit', [
            'property' => $property ,'customers' => $customers,
            'agents' => $agents
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

        $atr = [];
        for($i = 0; $i < count($request['key']); $i++){
            $atr[$request['key'][$i]] = $request['value'][$i];

        }
        $request['attributes'] = collect($atr)->toJson();
        
        $property = Property::find($id);
        $this->validate($request ,[
            'property_no' => 'required',
            'property_name' => 'required',
            'property_type' => 'required',
            'location' => 'required',
            'plot_no' => 'required',
            'size' => 'required',
            'price' => 'required',
            'due_date' => 'required',
            'cusotmer_id',
            'agent_id',
            'attributes' => 'required|json'
          ]);
        Property::find($id)->update($request->all());
        return redirect()->route('property.index')->with('success' , 'Property updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Property::find($id)->delete();
        return redirect(route('property.index'));
    }

    public function property_invoice($id){
        $property = Property::find($id);

        $today = Carbon::now()->toFormattedDateString();

        $total = 0;
        foreach($property->payment as $payment){
            $total += $payment->amount;
        }

        return view('property.invoice', [
            'property' => $property, 'today' => $today,
            'total' => $total
        ]);
    }

    public function print_invoice($id)
    {

        $property = Property::find($id);

        $today = Carbon::now()->toFormattedDateString();

        $total = 0;
        foreach($property->payment as $payment){
            $total += $payment->amount;
        }

        return view('property.print-invoice', [
            'property' => $property, 'today' => $today,
            'total' => $total
        ]);
    }

    public function pdfview(Request $request, $id)
    {
        $property = Property::find($id);

        $properties = Property::all();

        view()->share('property', $property);

        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
        }

        $properties = Property::all();
        $payments  = Payment::all();
        $agents = Agent::all();

        return view('property/index',[
            'properties' => $properties, 'payments' => $payments,
             'agents' => $agents,
        ]);
    }

    public function pdf($id)
    {
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($this->printable($id));
        return $pdf->stream();
    }

   public function printable($id)
    {
        $property = Property::find($id);

        $today = Carbon::now()->toFormattedDateString();

        $output = '
            <div class="row">
                        <div class="col-xs-12">
                        <h2 class="page-header">
                            <i class="fa fa-globe"></i> Real, Estate.
                            <small class="pull-right">Date: '. $today .'</small>
                        </h2>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- info row -->
                    <div class="row invoice-info">
                        <div class="col-sm-4 invoice-col">
                        From
                        <address>
                            <strong>Real, Estate.</strong><br>
                            <strong>Address</strong>: Brusubi Housing Estate<br>
                            <strong>Phone</strong>: 3788015<br>
                            <strong>Email</strong>: ojaiteh.com
                        </address>
                        </div>
                        <!-- /.col -->
                        ';
        $output .= '
                        <div class="col-sm-4 invoice-col">
                        To           
                        <address>
                            <strong>Customer Name</strong>: ' .$property->customer->fname .' '. $property->customer->lname .'<br>
                            <strong>Address</strong>: '.$property->customer->address. '<br>
                            <strong>Phone</strong>: '. $property->customer->phone .'<br>
                            <strong>Email</strong>: '. $property->customer->email .'
                        </address>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 invoice-col">
                        <b>Invoice #007612</b><br>
                        <b>Property No: </b> '. $property->property_no .'<br>
                        <b>Property Name: </b> '. $property->property_name .' <br>
                        <b>Property Type: </b>'. $property->property_type .' <br>
                        <b>Location: </b> '. $property->location .'</b> 
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                    ';
        $output .= '

                    <!-- Table row -->
                    <div class="row">
                        <div class="col-xs-12 table-responsive">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                            <th>No</th>
                            <th>Date</th>
                            <th>Payment Mode</th>
                            <th>Payment Method</th>
                            <th>Payment Amount</th>
                            
                            </tr>
                            </thead>
                            <tbody> 
                            ';

                                $total = 0;
                                foreach($property->payment as $payment){
                                    $total += $payment->amount;
                                }

                                $counter = 0;

                                foreach($property->payment as $payment){
                                    $counter = $counter + 1;

                                    $output .='
                                    <tr>
                                    <td>'. $counter .'</td>
                                    <td>'. $payment->created_at .'</td>
                                    <td>'. $payment->payment_mode .'</td>
                                    <td>'. $payment->payment_method .'</td>
                                    <td>'. $payment->amount .'</td>
                                    </tr>
                                    <tr>
                                    
                                    <tr>
                                        <td><strong>Total</strong></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>'. $total .'</td>
                                    </tr>
                                    </tbody>
                                </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                    
                            ';

        }
        return $output;
    }
}
