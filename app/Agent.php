<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Agent extends Model
{   
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'fname', 'mname', 'lname'
        ,'address', 'phone', 'email' ,'type'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

}
