<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'indentity_name' ,'indentity_number', 'fname' ,'mname',
        'lname', 'phone', 'email', 'address',
        'gender' , 'nationality','deposit', 'type'
    ];
    public function properties()
    {
        return $this->hasMany(Property::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function contructions()
    {
        return $this->hasMany(Construction::class);
    }

}
