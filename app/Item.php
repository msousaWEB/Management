<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'products';
    protected $fillable = ['name', 'description', 'weight', 'unit_id', 'provider_id'];

    public function productDetail(){
        return $this->hasOne('App\ItemDetail', 'product_id', 'id');
    }

    public function provider(){
        return $this->belongsTo('App\Provider');
    }
}
