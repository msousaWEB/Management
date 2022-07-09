<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Provider extends Model
{
    use SoftDeletes;
    //
    // protected $table = 'fornecedores';
    protected $fillable = ['name', 'site', 'uf', 'email'];
}
