<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    //
    protected $table = 'attendance';
    protected $fillable = [
        'employee_id',
        'from_time',
        'to_time',
        'created_by',
        'updated_by',
        'remarks'
    ];

    public function employees()
    {
        return $this->belongsTo('App\Employee', 'employee_id');
    }
}
