<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model
{   
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'amount' ,'payment_mode' , 'payment_method','property_id', 'customer_id'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
