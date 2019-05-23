<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Construction extends Model
{
  use SoftDeletes;

  protected $dates = ['deleted_at'];

  protected $fillable = [
      'type', 'details', 'cost', 'worker_name', 'worker_type',
      'work_type', 'status', 'start_date','end_date', 'location', 'customer_id'
  ];

  public function customer()
  {
      return $this->belongsTo(Customer::class);
  }

}
