<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{
    protected $fillable = ['product_id', 'length', 'width', 'height', 'unit_id'];

    public function product(){
        return $this->belongsTo('App\Product');
    }
}
