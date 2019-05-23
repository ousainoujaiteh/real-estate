<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LandLord extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'fname', 'mname' ,'lname', 'phone',
        'email' ,'address' ,'kin_name' ,
        'relationship' , 'kin_number', 'property_id'
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
