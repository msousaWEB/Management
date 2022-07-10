<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReasonContact;

class ContactController extends Controller
{
    public function contact(Request $request) {
        $reason_contacts = ReasonContact::all();

        return view('site.contact', ['reason_contacts' => $reason_contacts]);
    }

    public function save(Request $request) {
        //Validar os dados do request
        $request->validate([
            'name'              => 'required|min:3|max:40', //min 3 / max 40
            'tel'               => 'required',
            'email'             => 'required',
            'reason_contact'    => 'required',
            'message'           => 'required|max:500',
        ]);

        // SiteContact::create($request->all());
    }
}
