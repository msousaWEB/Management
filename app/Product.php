<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'weight', 'unit_id'];

    public function productDetail(){
        return $this->hasOne('App\ProductDetail');
    }
}
