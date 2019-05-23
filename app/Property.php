<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Property extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'property_no', 'property_name', 'property_type', 'location',
        'plot_no', 'size',  'price', 'due_date'
        ,'customer_id', 'agent_id', 'attributes',
    ];
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function payment()
    {
        return $this->hasMany(Payment::class);
    }

    public function paid()
    {
        $total = 0;
        foreach($this->payment as $payment){
            $total += $payment->amount;
        }
        return $total;
    }

    public function balance()
    {
        return $this->price - $this->paid();
    }

    public function _balance()
    {
        return 'GMD'. ' ' .$this->balance();
    }

    public function _paid()
    {
        return 'GMD'. ' ' .$this->paid();
    }

    public function _price()
    {
        return 'GMD'. ' ' .$this->price;
    }

    public function payment_done()
    {
        return $this->balance() > 0 ? false : true;
    }

    public function agent()
    {
        return $this->belongsTo(Agent::class);
    }

    public function land_lord()
    {
        return $this->hasOne(LandLord::class);
    }
}
