<?php

use Illuminate\Database\Seeder;
use App\ReasonContact;

class ReasonContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ReasonContact::create(['reason_contact' => 'Dúvida']);
        ReasonContact::create(['reason_contact' => 'Elogio']);
        ReasonContact::create(['reason_contact' => 'Reclamação']);
        ReasonContact::create(['reason_contact' => 'Suporte']);
    }
}
