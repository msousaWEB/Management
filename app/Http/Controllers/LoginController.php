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
        if($request->get('error') == 2) {
            $error = 'É necessário estar logado para acessar esta página.';
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
            session_start();
            $_SESSION['name'] = $exists->name;
            $_SESSION['email'] = $exists->email;

            return redirect()->route('app.home');
        } else {
            return redirect()->route('site.login', ['error' => 1]);
        }
    }

    public function quit() {
        session_destroy();
        return redirect()->route('site.index');
    }
}
