<?php

use Illuminate\Database\Seeder;
use App\SiteContact;

class SiteContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contact = new SiteContact();

        $contact->name = 'System SM';
        $contact->tel = '(19) 66666-9999';
        $contact->email = 'contact@sg.com';
        $contact->reason_contact = 1;
        $contact->message = 'Seja bem-vindo ao sitema!';

        $contact->save();
    }
}
