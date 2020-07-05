<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //

    protected $fillable = [
        'supplier_id',
        'name_long',
        'name_short',
        'stock_qty',
        'unit', 
        'created_by',
        'updated_by',
        'remarks',
    ];

    public function purchases()
    {
        return $this->hasMany('App\Purchase', 'item_id');
    }

    public function suppliers()
    {
        return $this->belongsTo('App\Supplier', 'supplier_id');
    }

    public function interests()
    {
        return $this->hasMany('App\Interest', 'item_id');
    }
}
