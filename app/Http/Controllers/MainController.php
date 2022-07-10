<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ReasonContact;

class MainController extends Controller
{
    public function main() {

        $reason_contacts = ReasonContact::all();

        return view('site.main', ['reason_contacts' => $reason_contacts]);
    }
}
