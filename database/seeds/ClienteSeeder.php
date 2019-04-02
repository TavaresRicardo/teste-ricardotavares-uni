<?php

use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clientes')->insert(
            ['nome' => 'Ricardo Goncalves Tavares', 'data_nascimento' => '1988/09/07',
             'created_at' => '2019-03-30 01:55:07' ]);
        DB::table('clientes')->insert(
            ['nome' => 'Carlos Goncalves Tavares', 'data_nascimento' => '1990/06/27',
             'created_at' => '2019-03-30 01:57:27' ]);
        DB::table('clientes')->insert(
            ['nome' => 'Flavia Goncalves Tavares', 'data_nascimento' => '1981/06/04',
             'created_at' => '2019-03-30 01:59:04' ]);
        DB::table('clientes')->insert(
            ['nome' => 'Vera Goncalves Tavares', 'data_nascimento' => '1968/09/04',
             'created_at' => '2019-03-30 01:57:04' ]);
        DB::table('clientes')->insert(
            ['nome' => 'Nedy Tavares Nepomuceno', 'data_nascimento' => '1958/08/23',
             'created_at' => '2019-03-30 02:00:23' ]);
        DB::table('clientes')->insert(
            ['nome' => 'Anna Paula Gomes Castro', 'data_nascimento' => '1991/11/06',
             'created_at' => '2019-03-30 02:07:28' ]);
    }
}
