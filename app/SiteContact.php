<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SiteContact extends Model
{
    protected $fillable = ['name', 'tel', 'email', 'reason_contact', 'message'];
} 
