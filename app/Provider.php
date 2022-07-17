<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;
    //
    protected $table = 'providers';
    protected $fillable = ['name', 'site', 'uf', 'email'];

    public function products(){
        return $this->hasMany('App\Item', 'provider_id', 'id');
    }
}
