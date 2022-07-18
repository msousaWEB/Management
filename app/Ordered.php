<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordered extends Model
{
    public function products(){
        // return $this->belongsToMany('App\Product', 'ordered_products');
        return $this->belongsToMany('App\Item', 'ordered_products','ordered_id','product_id')->withPivot('id','created_at');
    }
}
