<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //

    protected $fillable = [
        'client_id',
        'item_id',
        'invoice_no',
        'cost',
        'qty',
        'discount',
        'addl_fee',
        'paid_on',
        'created_by',
        'updated_by',
    ];

    public function clients()
    {
        return $this->belongsTo('App\Client', 'client_id');
    }

    public function items()
    {
        return $this->belongsTo('App\Item', 'item_id');
    }
}
