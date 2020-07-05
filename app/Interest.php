<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interest extends Model
{
    //
    protected $fillable = [
        'item_id',
        'qty_from',
        'qty_to', 
        'rate',
        'created_by',
        'updated_by',
        'remarks'
    ];

    public function items()
    {
        return $this->belongsTo('App\Item', 'item_id');
    }
}
