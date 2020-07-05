<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    //
    protected $table = 'payroll';
    protected $fillable = [
        'employee_id',
        'hours_worked',
        'cost',
        'created_by',
        'updated_by',
        'remarks'
    ];

    public function employees()
    {
        return $this->belongsTo('App\Employee', 'employee_id');
    }
}
