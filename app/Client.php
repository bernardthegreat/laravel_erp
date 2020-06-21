<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //

    protected $fillable = [
        'name_short',
        'name_long',
        'address',
        'contact_no',
        'payment_term',
        'created_by',
        'updated_by',
        'remarks'
    ];

    public function sales()
    {
        return $this->hasMany('App\Sale', 'client_id');
    }
}
