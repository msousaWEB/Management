<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class LoginController extends Controller
{
    public function index(Request $request){
        $error = '';
        if($request->get('error') == 1) {
            $error = 'Usuário e / ou senha incorretos!';
        }

        return view('site.login', ['title' => 'Login', 'error' => $error]);
    }

    public function auth(Request $request) {
        //Regras de validação
        $rules = [
            'user' => 'email',
            'password' => 'required'
        ];

        $feedback = [
            'user.email' => 'É necessário preencher este campo!',
            'password.required' => 'É necessário preencher este campo!'
        ];

        $request->validate($rules, $feedback);

        //Recuperando os parametros do form
        $email = $request->get('user');
        $password = $request->get('password');

        //Iniciar model Users
        $user = new User();

        $exists = $user->where('email', $email)->where('password', $password)->get();
        $exists = $exists->first();

        if(isset($exists->name)) {

        } else {
            return redirect()->route('site.login', ['error' => 1]);
        }
    }
}
