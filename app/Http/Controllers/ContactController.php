<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContact;

class ContactController extends Controller
{
    public function contact(Request $request) {
        // echo '<pre>';
        // print_r($request->all());
        // $contact = new SiteContact();
        // $contact->name              = $request->input('name');
        // $contact->tel               = $request->input('tel');
        // $contact->email             = $request->input('email');
        // $contact->reason_contact    = $request->input('reason_contact');
        // $contact->message           = $request->input('message');
        // // // print_r($contact->getAttributes());
        // // $contact->save();
        // $contact = new SiteContact();
        // $contact->fill($request->all());
        // // $contact->create($request->all());
        // $contact->save();
        // print_r($contact->getAttributes());


        return view('site.contact');
    }

    public function save(Request $request) {
        //Validar os dados do request
        $request->validate([
            'name'              => 'required',
            'tel'               => 'required',
            'email'             => 'required',
            'reason_contact'    => 'required',
            'message'           => 'required',
        ]);

        SiteContact::create($request->all());
    }
}
