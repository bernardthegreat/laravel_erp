<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //

    protected $fillable = [
        'first_name',
        'last_name',
        'middle_name',
        'name_suffix', 
        'address',
        'created_by',
        'updated_by',
        'remarks'
    ];

    public function payrolls()
    {
        return $this->hasMany('App\Payroll', 'employee_id');
    }

    public function attendances()
    {
        return $this->hasMany('App\Attendance', 'employee_id');
    }
}
