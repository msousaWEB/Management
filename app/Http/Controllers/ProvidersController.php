<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProvidersController extends Controller
{
    public function index(){
        $providers = [
            0 => ['name' => 'Michael Scott', 'status' => 'N', 'cnpj' => '00.000.000/000-00'],
            1 => ['name' => 'Jim Halpert', 'status' => 'S', 'cnpj' => '00.000.000/000-01'],
            2 => ['name' => 'Dwight Schrute', 'status' => 'S', 'cnpj' => '00.000.000/000-02'],
        ];

        return view('app.providers.index', compact('providers'));
    }
}
