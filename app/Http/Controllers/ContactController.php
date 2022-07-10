<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReasonContact;
use App\SiteContact;

class ContactController extends Controller
{
    public function contact(Request $request) {
        $reason_contacts = ReasonContact::all();

        return view('site.contact', ['reason_contacts' => $reason_contacts]);
    }

    public function save(Request $request) {
        $rules = [
            'name'                  => 'required|min:3|max:40|unique:site_contacts', //min 3 / max 40
            'tel'                   => 'required',
            'email'                 => 'email',
            'reason_contacts_id'    => 'required',
            'message'               => 'required|max:500',
        ];
        $feedback = [
            'name.min'      => 'É necessário ter no mínimo 3 caracteres.',
            'name.max'      => 'É necessário ter no máximo 40 caracteres.',
            'name.unique'   => 'Este nome já está em uso, tente outro nome.',
            'message.max'   => 'É necessário ter no máximo 500 caracteres.',
            'email.email'   => 'Este email não é válido',
            'required'      => 'É nescessário preencher este campo!',
        ];

        //Validar os dados do request
        $request->validate($rules, $feedback);

        SiteContact::create($request->all());
        return redirect()->route('site.index');
    }
}
