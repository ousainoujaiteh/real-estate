<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Payment;
use App\Property;
use App\Customer;
use App\Agent;
class PaymentController extends Controller
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

        if(!Auth::user()->role->create_payment){
            return redirect()->back();
        }
        $payments = Payment::all();
        $morgages = Payment::all()->where('payment_mode', 'Morgage');
        $installments = Payment::all()->where('payment_mode', 'Installment');
        $properties = Property::all();
        $customers = Customer::all();
        return view('payment/index',['payments' => $payments, 'morgages' => $morgages,
            'installments' => $installments, 'customers' => $customers,
            'properties' => $properties,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!Auth::user()->role->create_payment){
            return redirect()->back();
        }

        $properties = Property::all();
        $customers = Customer::all();
        return view('payment/create',[
            'properties' => $properties, 'customers' => $customers
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

        if(!Auth::user()->role->create_payment){
            return redirect()->back();
        }

        $this->validate($request ,[
            'amount' => 'required',
            'payment_mode' => 'required',
            'payment_method' => 'required',
            'property_id' => 'required',
            'customer_id' => 'required',
        ]);

        Payment::create($request->all());
        return redirect()->route('payment.index')->with('success', 'Payment Save Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        if(!Auth::user()->role->create_payment){
            return redirect()->back();
        }
        $payment = Payment::find($id);
        $properties = Property::all();
        $customers = Customer::all();
        $agents = Agent::all();
        return view('payment.show', [
            'payment' => $payment, 'properties' => $properties,
            'customers' => $customers, 'agents' => $agents
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

        if(!Auth::user()->role->create_payment){
            return redirect()->back();
        }
        $payment = Payment::find($id);
        $properties = Property::all();
        $customers = Customer::all();
        return view('payment.edit',[
            'payment' => $payment ,'properties' => $properties,
            'customers' => $customers
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

        if(!Auth::user()->role->create_payment){
            return redirect()->back();
        }
      $payment = Payment::find($id);

      Payment::find($id)->update($request->all());

      $this->validate($request ,[
        'amount' => 'required',
        'payment_mode' => 'required',
        'payment_method' => 'required',
        'property_id' => 'required',
        'customer_id' => 'required',
    ]);

      return redirect()->route('payment.index')->with('success' , 'Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!Auth::user()->role->create_payment){
            return redirect()->back();
        }
      Payment::find($id)->delete();
      return redirect(route('payment.index'));
    }

    public function payment_invoice($id){

        if(!Auth::user()->role->create_payment){
            return redirect()->back();
        }
        $payment = Payment::find($id);

        $today = Carbon::now()->toFormattedDateString();

        return view('payment.payment-receipt', [
            'payment' => $payment, 'today' => $today,
        ]);
    }

    public function print_payment_invoice($id)
    {

        if(!Auth::user()->role->create_payment){
            return redirect()->back();
        }
        $payment = Payment::find($id);

        $today = Carbon::now()->toFormattedDateString();

        return view('payment.print-receipt', [
            'payment' => $payment, 'today' => $today,
        ]);
    }
}
