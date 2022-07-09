<?php

use Illuminate\Database\Seeder;
use App\Provider;
use Illuminate\Support\Facades\DB;

class ProviderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Instanciando o objeto
        $provider = new Provider();
        $provider->name = 'Dunder Mufflin';
        $provider->site = 'dundermufflin.com.br';
        $provider->uf   = 'SP';
        $provider->email = 'dmufflin@gmail.com';
        $provider->save();

        //Método create (atributo fillable)
        Provider::create([
            'name' => 'Steel',
            'site' => 'steel.com.br',
            'uf'   => 'PI',
            'email' => 'steel@gmail.com',
        ]);

        //Insert
        DB::table('providers')->insert([
            'name' => 'Sony',
            'site' => 'sony.com.br',
            'uf'   => 'MG',
            'email' => 'sony@gmail.com',
        ]);
    }
}
