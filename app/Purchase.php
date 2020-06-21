<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    //
    protected $fillable = [
        'item_id',
        'dr_no',
        'cost',
        'qty',
        'created_by',
        'updated_by',
        'remarks'
    ];

    public function items()
    {
        return $this->belongsTo('App\Item', 'item_id');
    }

    public function sales()
    {
        return $this->hasMany('App\Sale', 'purchase_id');
    }
}
