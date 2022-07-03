<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvidersController extends Controller
{
    public function index(){
        $providers = ['Michael Scott'];
        return view('app.providers.index', compact('providers'));
    }
}
