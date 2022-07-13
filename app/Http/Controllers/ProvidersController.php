<?php

namespace App\Http\Controllers;

use App\Provider;
use Illuminate\Http\Request;

class ProvidersController extends Controller
{
    public function index() {
        return view('app.provider.index');
    }

    public function list(Request $request){


        $providers = Provider::where('name', 'LIKE', '%'.$request->input('name').'%')
        ->where('site', 'LIKE', '%'.$request->input('site').'%')
        ->where('uf', 'LIKE', '%'.$request->input('uf').'%')
        ->where('email', 'LIKE', '%'.$request->input('email').'%')
        ->get();

        return view('app.provider.list_provider', ['providers' => $providers]);
    }

    public function add(Request $request){
        $msg = '';

        if($request->input('_token') != '') {
            $rules = [
                'name'  => 'required|min:4|max:40',
                'site'  => 'required',
                'uf'    => 'required|min:2|max:2',
                'email' => 'email',
            ];

            $feedback = [
                'required'  => 'É nescessário preencher o campo :attribute.',
                'name.min'  => 'É nescessário conter no mínimo 4 caracteres.',
                'name.max'  => 'É nescessário conter no máximo 40 caracteres.',
                'uf.min'    => 'UF deve conter no mínimo 2 caracteres.', 
                'uf.max'    => 'UF deve conter no máximo 2 caracteres.', 
                'email'     => 'Email inválido!', 
            ];

            $request->validate($rules, $feedback);

            $provider = new Provider();
            $provider->create($request->all());

            $msg = 'Cadastro realizado com sucesso!';
        }

        return view('app.provider.add_provider', ['msg' => $msg]);
    }
}
