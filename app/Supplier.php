<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //

    protected $fillable = [
        'name_short',
        'name_long',
        'address',
        'contact_no',
        'created_by',
        'updated_by',
        'remarks'
    ];

    public function items()
    {
        return $this->hasMany('App\Item', 'item_id');
    }

}
