<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Utility extends Model
{
    //
    protected $fillable = [
        'utility_type_id',
        'cost',
        'created_by',
        'updated_by',
        'from_date',
        'to_date',
        'remarks'
    ];

    public function utility_types()
    {
        return $this->belongsTo('App\UtilityType', 'utility_type_id');
    }
}
