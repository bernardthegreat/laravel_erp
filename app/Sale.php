<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //

    protected $fillable = [
        'client_id',
        'purchase_id',
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

    public function purchases()
    {
        return $this->belongsTo('App\Purchase', 'purchase_id');
    }
}
