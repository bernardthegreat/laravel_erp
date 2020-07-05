<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UtilityType extends Model
{
    //
    protected $fillable = [
        'name_short',
        'name_long',
        'created_by',
        'updated_by',
        'remarks'
    ];

    public function utilities()
    {
        return $this->hasMany('App\Utility', 'utility_type_id');
    }
}
