<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function main() {

        $reason_contacts = [
            '1' => 'Dúvida',
            '2' => 'Elogio',
            '3' => 'Reclamação',
        ];

        return view('site.main', ['reason_contacts' => $reason_contacts]);
    }
}
