<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalaryRate extends Model
{
    //
    protected $fillable = [
        'employee_id',
        'hourly_fee',
        'created_by',
        'updated_by',
        'remarks'
    ];

    public function employees()
    {
        return $this->belongsTo('App\Employee', 'employee_id');
    }
}
