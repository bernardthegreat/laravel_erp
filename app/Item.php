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
        'created_by',
        'updated_by',
    ];

    public function purchases()
    {
        return $this->hasMany('App\Purchase', 'item_id');
    }

    public function suppliers()
    {
        return $this->belongsTo('App\Supplier', 'supplier_id');
    }
}
