<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
     'name', 'description', 'create_user', 'create_payment' 
     ,'view_payment', 'view_dashboard', 'create_role', 'view_report',
    ];

    public function users()
    {
        return $this->hasMany(User::class,'roles_id');
    }
}
