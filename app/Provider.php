<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    //
    // protected $table = 'fornecedores';
    protected $fillable = ['name', 'site', 'uf', 'email'];
}
