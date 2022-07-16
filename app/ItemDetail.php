<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemDetail extends Model
{
    protected $table = 'product_details';
    protected $fillable = ['product_id', 'length', 'width', 'height', 'unit_id'];

    public function product(){
        return $this->belongsTo('App\Item', 'product_id', 'id');
    }
}
