<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Customer;
use App\Property;
use App\Construction;
use App\Payment;
use App\LandLord;
use App\Agent;
use DB;
use Auth;
use Spatie\Activitylog\Models\Activity;
class DashboardController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
  
    public function index()
    {
        $message = Auth::user()->fname ." ". Auth::user()->lname." "."View the Dashboard to see system overview";
        $model = "Payment";
        $userModel = Auth::user()->username;
        activity()
            ->log(auth()->user()->username.$message);

        if(!Auth::user()->role->view_dashboard){
            return redirect()->back();
        }

      $customer = Customer::count();
      $property = Property::count();
      $construction = Construction::count();
      $payment = Payment::count();

      $rents = Property::where('property_type', 'rent')->count();
      $sales = Property::where('property_type', 'sale')->count();
      $lease = Property::where('property_type', 'lease')->count();

      if($property == 0){
        $rentPercentage = 0;
        $salePercentage = 0;
        $leasePercentage = 0;
      }else{
        $rentPercentage = $rents / $property;
        $salePercentage = $sales / $property;
        $leasePercentage = $lease / $property;
      }


      $jan = $this->get_year_month(1);
      $feb = $this->get_year_month(2);
      $mar = $this->get_year_month(3);
      $apl = $this->get_year_month(4);
      $may = $this->get_year_month(5);
      $june = $this->get_year_month(6);
      $july = $this->get_year_month(7);
      $aug = $this->get_year_month(8);
      $sep = $this->get_year_month(9);
      $oct = $this->get_year_month(10);
      $nov = $this->get_year_month(11);
      $dec = $this->get_year_month(12);
     

      $months = [];
      $months[0] = $jan;
      $months[1] = $feb;
      $months[2] = $mar;
      $months[3] = $apl;
      $months[4] = $may;
      $months[5] = $june;
      $months[6] = $july;
      $months[7] = $aug;
      $months[8] = $sep;
      $months[9] = $oct;
      $months[10] = $nov;
      $months[11] = $dec;
    
     
      
      $property_data = $this->get_data_of_the_month('properties');
      $customer_data = $this->get_data_of_the_month('customers');
      $payment_data = $this->get_data_of_the_month('payments');
      $construction_data = $this->get_data_of_the_month('constructions');
      $land_lord_data = $this->get_data_of_the_month('land_lords');
      $agent_data = $this->get_data_of_the_month('agents');

      $current_year = Carbon::now()->year;

      return view('dashboard', ['customer' => $customer, 'property' => $property, 
            'construction' => $construction , 'payment' => $payment,
            'rentPercentage' => $rentPercentage, 'salePercentage' => $salePercentage, 'leasePercentage' => $leasePercentage,
            'months' => $months, 'property_data' => $property_data, 'customer_data' => $customer_data, 'payment_data' => $payment_data,
            'construction_data' => $construction_data, 'land_lord_data' => $land_lord_data, 'agent_data' => $agent_data, 'current_year' => $current_year,
      ]);
    }

    /* The function responsible for getting
     *  the of properties added in month
     *  and return the value
     */
    public function get_year_month($value){
        $now = Carbon::now()->year;
        return Property::whereYear('created_at', $now)->whereMonth('created_at', $value)->count();
    }

    /* The function is responsible for getting
     *  number of values in specific table added in month
     *  and return the value
     */
    public function get_data_of_the_month($table){
        $data = [];
        $now = Carbon::now()->year;
        for($i = 1; $i <= 12; $i++){
            $data[$i] = DB::table($table)->whereYear('created_at', $now)->whereMonth('created_at', $i)->count();
        }
        return $data;
    }

}
